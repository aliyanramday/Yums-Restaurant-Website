<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title')</title>

  <!-- your CSS -->
  <link rel="stylesheet" href="{{ asset('Yums/style.css') }}">
</head>
<body>

  <!-- ===== HEADER ===== -->
  <header class="site-header">
    <nav class="navbar">
      <!-- left links -->
      <ul class="nav-links">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('menu') }}">Menu</a></li>
        <li><a href="{{ route('bookatable') }}">Book-a-Table</a></li>
      </ul>

      <!-- center logo + label -->
      <div class="logo">
        <a href="{{ route('home') }}">
          <img src="https://www.freepnglogos.com/uploads/burger-png/burger-png-png-images-yellow-images-12.png" alt="Yums"><br>
          <span class="brand">Yums</span>
        </a>
      </div>

      <!-- right buttons -->
      <div class="nav-actions">
        @guest
          <a href="{{ route('login') }}"  class="btn btn-outline">Login</a>
          <a href="{{ route('login') }}"  class="btn btn-outline">Sign Up</a>
        @else
          <a href="{{ route('logout') }}"
             class="btn btn-outline"
             onclick="event.preventDefault();document.getElementById('logout-form').submit()">
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
          </form>
        @endguest

        <a href="{{ route('order') }}" class="btn btn-primary">
          @if(session()->has('order_id'))
            View Your Order
          @else
            Order
          @endif
        </a>
      </div>
    </nav>
  </header>

  <!-- ===== PAGE CONTENT ===== -->
  <main>
    @yield('content')
  </main>

  <!-- your JS -->
  <script src="{{ asset('Yums/script.js') }}"></script>
</body>
</html>
