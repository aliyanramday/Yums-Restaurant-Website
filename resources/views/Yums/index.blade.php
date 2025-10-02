{{-- resources/views/Yums/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Yums – Home')

@section('content')
  <!-- ===== HEADER ===== -->
  

  <!-- ===== HERO ===== -->
  <main class="hero">
    <div class="hero-overlay">
      <h1>Welcome to Yums</h1>
      <p>Where juicy patties, crispy fries, and mouth-watering flavors collide. Dive into burger bliss today!</p>
    </div>

    <section class="card-section">
      <!-- Flip card #1 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="{{ asset('Yums/signuplogin.jpg') }}" alt="Sign Up or Login">
          </div>
          <div class="flip-card-back">
            <h2>Get 10% Off!</h2>
            <p>Sign up or login now to enjoy a 10% discount on your first order!</p>
            <a href="{{ route('login') }}" class="btn btn-primary">Sign Up / Login</a>
          </div>
        </div>
      </div>

      <!-- Flip card #2 -->
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="{{ asset('Yums/burger.jpg') }}" alt="Delicious Burger">
          </div>
          <div class="flip-card-back">
            <h2>Order Now!</h2>
            <p>Taste the best burgers in town at Yums.</p>
            <a href="{{ route('menu') }}" class="btn btn-primary">Order Now</a>
          </div>
        </div>
      </div>
    </section>
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

    <!-- Bottom center: copyright -->
    <div class="footer-bottom">
      <p>&copy; 2025 Yums. All rights reserved.</p>
    </div>
  </footer>
@endsection
