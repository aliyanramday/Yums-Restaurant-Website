{{-- resources/views/Yums/login.blade.php --}}
@extends('layouts.app')

@section('title','Yums – Login / Signup')

@section('content')
  <!-- ===== HEADER ===== -->
  <

  <!-- AUTH PAGE -->
  <main class="auth-container">
    <div class="auth-left">
      <img src="https://th.bing.com/th/id/OIP._mfknNvUVWH8JrdQPv0fNQHaE8?w=284&h=190&c=7&r=0&o=5&dpr=2&pid=1.7" alt="Burger">
    </div>
    <div class="auth-right">
      <div class="auth-form card">
        @if ($error)
          <p class="error">{{ $error }}</p>
        @endif

        <div class="tab-nav">
          <div class="active" onclick="toggleTab('signUp')">Sign Up</div>
          <div onclick="toggleTab('signIn')">Sign In</div>
        </div>

        <!-- SIGNUP FORM -->
        <form method="POST" class="sign-up-form">
          @csrf
          <div class="form-group">
            <label>Name</label>
            <input name="signup_name" value="{{ old('signup_name') }}" required>
            @error('signup_name') <p class="error">{{ $message }}</p> @enderror
          </div>
          <div class="form-group">
            <label>Email</label>
            <input name="signup_email" type="email" value="{{ old('signup_email') }}" required>
            @error('signup_email') <p class="error">{{ $message }}</p> @enderror
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="signup_password" type="password" required>
            @error('signup_password') <p class="error">{{ $message }}</p> @enderror
          </div>
          <button name="signup_submit" class="btn btn-primary">Create an Account</button>
        </form>

        <!-- SIGNIN FORM -->
        <form method="POST" class="sign-in-form" style="display:none;">
          @csrf
          <div class="form-group">
            <label>Email</label>
            <input name="login_email" type="email" value="{{ old('login_email') }}" required>
            @error('login_email') <p class="error">{{ $message }}</p> @enderror
          </div>
          <div class="form-group">
            <label>Password</label>
            <input name="login_password" type="password" required>
            @error('login_password') <p class="error">{{ $message }}</p> @enderror
          </div>
          <button name="login_submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </main>

  <script>
    function toggleTab(tab) {
      const signUp = document.querySelector('.sign-up-form');
      const signIn = document.querySelector('.sign-in-form');
      document.querySelectorAll('.tab-nav > div').forEach(d => d.classList.remove('active'));

      if (tab === 'signUp') {
        document.querySelector('.tab-nav > div').classList.add('active');
        signUp.style.display = 'block';
        signIn.style.display = 'none';
      } else {
        document.querySelectorAll('.tab-nav > div')[1].classList.add('active');
        signIn.style.display = 'block';
        signUp.style.display = 'none';
      }
    }
  </script>
@endsection
