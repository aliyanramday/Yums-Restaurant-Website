<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Reservation;

class SiteController extends Controller
{
    // show the homepage
    public function home()
    {
        return view('Yums.index');
    }

    // show & handle the menu page
    public function menu(Request $request)
    {
        // 1) Login / order state
        $isLoggedIn   = Auth::check();
        $userId       = Auth::id();              // null if guest
        $hasOpenOrder = session()->has('order_id');

        // 2) Handle Add‐to‐Order (POST)
        if ($request->isMethod('post') && $request->filled('item_id','quantity')) {
            $itemId = (int)$request->input('item_id');
            $qty    = max(1, (int)$request->input('quantity'));

            // get or create open order
            if ($isLoggedIn) {
                $order = DB::table('orders')
                    ->where('user_id',$userId)
                    ->where('status','open')
                    ->first();
                $orderId = $order
                    ? $order->id
                    : DB::table('orders')->insertGetId([
                          'user_id' => $userId,
                          'total'   => 0,
                          'status'  => 'open'
                      ]);
            } else {
                $orderId = session('order_id');
                if (! $orderId) {
                    $orderId = DB::table('orders')->insertGetId([
                        'user_id' => null,
                        'total'   => 0,
                        'status'  => 'open'
                    ]);
                    session(['order_id' => $orderId]);
                }
            }

            // price & insert
            $price = MenuItem::findOrFail($itemId)->price;
            DB::table('order_items')->insert([
                'order_id'     => $orderId,
                'menu_item_id' => $itemId,
                'quantity'     => $qty,
                'price'        => $price
            ]);

            // update total
            DB::table('orders')
              ->where('id',$orderId)
              ->increment('total',$price * $qty);

            return redirect()->route('menu');
        }

        // 3) Fetch items by category
        $categories = ['Burgers','Fries','Drinks'];
        $itemsByCat = [];
        foreach ($categories as $cat) {
            $itemsByCat[$cat] = MenuItem::where('category',$cat)->get();
        }

        // 4) Prepare order summary
        $orderId    = session('order_id');
        $orderItems = [];
        $subtotal   = 0;
        if ($orderId) {
            $orderItems = DB::table('order_items as oi')
                ->join('menu_items as mi','oi.menu_item_id','=','mi.id')
                ->where('oi.order_id',$orderId)
                ->select('mi.name','oi.quantity','oi.price')
                ->get();
            foreach ($orderItems as $it) {
                $subtotal += $it->quantity * $it->price;
            }
        }
        $memberTotal = $isLoggedIn ? $subtotal * 0.9 : null;

        // 5) Render the Blade
        return view('Yums.menu', compact(
            'itemsByCat','orderItems','subtotal','memberTotal','hasOpenOrder'
        ));
    }

    // show the book-a-table page
    public function bookatable(Request $request)
    {
        // NAV STATE
        $isLoggedIn   = Auth::check();
        $hasOpenOrder = session()->has('order_id');

        // 1) Must be logged in
        if (! $isLoggedIn) {
            // Laravel will remember the intended URL automatically:
            return redirect()->route('login');
        }

        $reservation = null;

        // 2) Handle submission
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'name'       => 'required|string|max:255',
                'email'      => 'required|email|max:255',
                'phone'      => 'required|string|max:20',
                'date'       => 'required|date',
                'time'       => 'required',
                'party_size' => 'required|integer|min:1|max:20',
            ]);

            // 3) Insert into DB
            $data['user_id']   = Auth::id();
            $reservation       = Reservation::create($data);
        }

        return view('Yums.bookatable', compact(
            'isLoggedIn','hasOpenOrder','reservation'
        ));
    }

    // show the order page
    public function order()
    {
        // 1) Navbar state
        $isLoggedIn   = Auth::check();
        $hasOpenOrder = session()->has('order_id');

        // 2) Find the open order
        if ($isLoggedIn) {
            $order = DB::table('orders')
                ->where('user_id', Auth::id())
                ->where('status','open')
                ->first();
            $orderId = $order->id ?? null;
        } else {
            $orderId = session('order_id');
        }

        if (! $orderId) {
            return redirect()->route('menu');
        }

        // 3) Fetch order items
        $orderItems = DB::table('order_items as oi')
            ->join('menu_items as mi','oi.menu_item_id','=','mi.id')
            ->where('oi.order_id',$orderId)
            ->select('mi.name','oi.quantity','oi.price')
            ->get();

        // 4) Compute totals
        $subtotal   = $orderItems->sum(fn($it) => $it->quantity * $it->price);
        $memberTotal = $isLoggedIn ? $subtotal * 0.9 : null;

        // 5) Render view
        return view('Yums.order', compact(
            'isLoggedIn','hasOpenOrder','orderItems','subtotal','memberTotal'
        ));
    }

    // show the login page
    public function login(Request $request)
    {
        // NAV STATE
        $isLoggedIn   = Auth::check();
        $hasOpenOrder = session()->has('order_id');

        // If already logged in, go home
        if ($isLoggedIn) {
            return redirect()->route('home');
        }

        $error = null;

        // Handle POST
        if ($request->isMethod('post')) {
            // SIGNUP
            if ($request->has('signup_submit')) {
                $data = $request->validate([
                    'signup_name'     => 'required|string|max:255',
                    'signup_email'    => 'required|email|unique:users,email|max:255',
                    'signup_password' => 'required|string|min:6',
                ]);

                // Create the user
                $user = User::create([
                    'name'          => $data['signup_name'],
                    'email'         => $data['signup_email'],
                    'password_hash' => Hash::make($data['signup_password']),
                ]);

                // Log them in
                Auth::login($user);

                return redirect()->route('home');
            }

            // LOGIN
            if ($request->has('login_submit')) {
                $data = $request->validate([
                    'login_email'    => 'required|email',
                    'login_password' => 'required|string',
                ]);

                $user = User::where('email', $data['login_email'])->first();

                if ($user && Hash::check($data['login_password'], $user->password_hash)) {
                    Auth::login($user);
                    return redirect()->route('home');
                }

                $error = 'Invalid email or password.';
            }
        }

        // Show the form
        return view('Yums.login', compact(
            'isLoggedIn','hasOpenOrder','error'
        ));
    }

    

    // show the logout confirmation
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate and regenerate session to prevent fixation
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
