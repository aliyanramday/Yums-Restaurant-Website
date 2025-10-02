{{-- resources/views/Yums/order.blade.php --}}
@extends('layouts.app')

@section('title', 'Yums – Your Order')

@section('content')
  <!-- ===== HEADER ===== -->
  

  <!-- MAIN ORDER CONTENT -->
  <main class="order-page">
    <div class="order-container card">
      <h2>Your Order</h2>

      @if (empty($orderItems))
        <p>Your order is empty. <a href="{{ route('menu') }}">Go pick something delicious!</a></p>
      @else
        <table class="order-table">
          <thead>
            <tr>
              <th>Item</th>
              <th>Qty</th>
              <th>Price</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($orderItems as $it)
            <tr>
              <td>{{ $it->name }}</td>
              <td>{{ $it->quantity }}</td>
              <td>£{{ number_format($it->quantity * $it->price, 2) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="order-summary">
          <p><strong>Subtotal:</strong> £{{ number_format($subtotal, 2) }}</p>
          @if ($isLoggedIn)
            <p><strong>Member (10% off):</strong> £{{ number_format($memberTotal, 2) }}</p>
          @endif
        </div>

        <a href="#" id="checkoutBtn" class="btn btn-primary">Checkout</a>
      @endif
    </div>
  </main>

  <!-- ===== FOOTER ===== -->
  <footer class="site-footer">
    <div class="footer-main">
      <div class="footer-links">
        <ul>
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('menu') }}">Menu</a></li>
          <li><a href="{{ route('bookatable') }}">Book-a-Table</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
      </div>
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

  <!-- pop-up + redirect on checkout -->
  <script>
    document.getElementById('checkoutBtn')?.addEventListener('click', e => {
      e.preventDefault();
      alert("Thanks for your order!\nWe'll email you shortly with confirmation.");
      window.location = '{{ route('home') }}';
    });
  </script>
@endsection
