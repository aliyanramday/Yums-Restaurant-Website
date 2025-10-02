{{-- resources/views/Yums/menu.blade.php --}}
@extends('layouts.app')

@section('title', 'Yums – Menu')

@section('content')
  <!-- ===== HEADER ===== -->
  

  <!-- ===== MENU CONTENT ===== -->
  <main class="menu-page">
    <div class="menu-container">

      @foreach($itemsByCat as $cat => $items)
        <section class="menu-section">
          <h2>{{ $cat }}</h2>
          <div class="menu-grid">
            @if (empty($items))
              <p>No {{ Str::lower($cat) }} found.</p>
            @endif

            @foreach($items as $item)
              <div class="menu-card">
                <img src="{{ $item->image_path }}" alt="{{ $item->name }}">
                <h3>{{ $item->name }}</h3>
                <p>{{ $item->description }}</p>
                <div class="menu-meta">
                  <span class="price">£{{ number_format($item->price, 2) }}</span>
                  <form method="POST" action="{{ route('menu') }}" class="add-form">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <input type="number" name="quantity" value="1" min="1" class="qty-input">
                    <button type="submit" class="btn btn-primary">Add</button>
                  </form>
                </div>
              </div>
            @endforeach

          </div>
        </section>
      @endforeach

      <!-- ===== ORDER SUMMARY ===== -->
      <aside class="order-summary">
        <h2>Your Order</h2>
        @if (count($orderItems))
          <ul>
            @foreach ($orderItems as $it)
+       <li>
+         {{ $it->name }} × {{ $it->quantity }} —
+         £{{ number_format($it->price * $it->quantity, 2) }}
+       </li>
+     @endforeach
          </ul>
          <p><strong>Subtotal:</strong> £{{ number_format($subtotal, 2) }}</p>
          @if(session()->has('user_id'))
            <p><strong>Member (10% off):</strong> £{{ number_format($memberTotal, 2) }}</p>
          @endif
          <a id="checkoutBtn" href="{{ route('order') }}" class="btn btn-primary">Checkout</a>
        @else
          <p>Your order is empty.</p>
        @endif
      </aside>

    </div>
  </main>

  <!-- ===== FOOTER ===== -->
  <footer class="site-footer">
    <div class="footer-main">
      <!-- Left: Links -->
      <div class="footer-links">
        <ul>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('menu') }}">Menu</a></li>
          <li><a href="{{ route('bookatable') }}">Book-a-Table</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
      </div>

      <!-- Right: Address + Map -->
      <div class="footer-contact">
        <p class="footer-address">
          <strong>Our Address</strong><br>
          Yums Burgers<br>
          Aston University<br>
          Birmingham, B4 7ET
        </p>
        <iframe
          src="https://maps.google.com/maps?q=Aston%20University%20Birmingham&t=&z=15&ie=UTF8&iwloc=&output=embed"
          frameborder="0"
          allowfullscreen
          loading="lazy">
        </iframe>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; 2025 Yums. All rights reserved.</p>
    </div>
  </footer>
@endsection
