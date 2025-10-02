{{-- resources/views/Yums/bookatable.blade.php --}}
@extends('layouts.app')

@section('title', 'Yums – Book a Table')

@section('content')
  <!-- ===== HEADER ===== -->
  

  <!-- ===== RESERVATION PAGE ===== -->
  <main class="reservation-page">
    <div class="left-image">
      <img
        src="https://th.bing.com/th/id/OIP._mfknNvUVWH8JrdQPv0fNQHaE8?w=284&h=190&c=7&r=0&o=5&dpr=2&pid=1.7"
        alt="Restaurant interior">
    </div>

    <div class="form-container card">
        <div class="card">
      <h2>Reserve Your Table</h2>
      <form method="POST" action="{{ route('bookatable') }}">
        @csrf

        <div class="form-group">
          <label for="name">Full Name</label>
          <input id="name" name="name" required value="{{ old('name') }}">
          @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input id="email" name="email" type="email" required value="{{ old('email') }}">
          @error('email') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input id="phone" name="phone" required value="{{ old('phone') }}">
          @error('phone') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group half">
          <label for="date">Date</label>
          <input id="date" name="date" type="date" required value="{{ old('date') }}">
          @error('date') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group half">
          <label for="time">Time</label>
          <input id="time" name="time" type="time" required value="{{ old('time') }}">
          @error('time') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
          <label for="party_size">Party Size</label>
          <input id="party_size" name="party_size"
                 type="number" min="1" max="20"
                 value="{{ old('party_size',2) }}" required>
          @error('party_size') <p class="error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Reserve</button>
      </form>
    </div>
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
          src="https://maps.google.com/maps?q=Aston%20University%20Birmingham&output=embed"
          frameborder="0" allowfullscreen loading="lazy">
        </iframe>
      </div>
    </div>
    <div class="footer-bottom">
      &copy; 2025 Yums. All rights reserved.
    </div>
  </footer>

  @if ($reservation)
    <script>
      const r = @json($reservation);
      alert(
        `Thank you, ${r.name}!` +
        `\nYour table for ${r.partySize} on ${r.date}` +
        ` at ${r.time} is confirmed.`
      );
    </script>
  @endif
@endsection
