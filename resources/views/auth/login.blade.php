<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Double Slider Login / Registration Form</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

  <div class="container" id="container">
    <!-- Display Error Messages -->
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Terms Modal -->
    <div id="terms-modal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Syarat dan Ketentuan</h2>
        <p>Lorem ipsum...</p>
        <button id="setuju-btn" class="setuju-btn">Setuju</button>
      </div>
    </div>

    <!-- Register Form -->
    <div class="form-container register-container">
      <form action="{{ route('register') }}" method="POST">
        @csrf
        <img class="logo" src="{{ asset('source/Logo.png') }}" alt="logo pantausam">
        <h2>Buat akun</h2>
        <p>Sudah punya akun? <a href="#" class="ghost" id="login">Log in</a></p>

        <div class="input-group">
          <input type="text" name="nama_depan" placeholder="Nama Depan" value="{{ old('nama_depan') }}" required>
          <input type="text" name="nama_belakang" placeholder="Nama Belakang" value="{{ old('nama_belakang') }}" required>
        </div>

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>

        <div class="input-password-group">
          <input type="password" name="password" placeholder="Password" required>
          <img id="register-toggle-password" src="{{ asset('source/eye-slash-svgrepo-com.svg') }}" alt="Show Password" class="eye-icon">
        </div>

        <div class="terms">
          <input type="checkbox" id="terms-checkbox" required>
          <label for="terms-checkbox">Setuju dengan <a href="#" id="terms-link">syarat & ketentuan</a></label>
        </div>

        <button type="submit">Buat akun</button>
        <div class="divider">atau menggunakan</div>
        <button type="button" class="google-login">
          <img src="https://lh3.googleusercontent.com/COxitqgJr1sJnIDe8-jiKhxDx1FrYbtRHKJ9z_hELisAlapwE9LUPh6fcXIfb5vwpbMl4xl9H9TRFPc5NOO8Sb3VSgIBrfRYvW6cUA" alt="Google Logo" width="20" style="vertical-align:middle;"> Google
        </button>
      </form>
    </div>

    <!-- Login Form -->
    <div class="form-container login-container">
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <img class="logo" src="{{ asset('source/Logo.png') }}" alt="logo pantausam">
        <h2>Masuk akun</h2>
        <p>Belum punya akun? <a href="#" class="ghost" id="register">Buat akun</a></p>

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>

        <div class="input-password-group">
          <input type="password" name="password" id="password-input" placeholder="Password" required>
          <img id="login-toggle-password" src="{{ asset('source/eye-slash-svgrepo-com.svg') }}" alt="Show Password" class="eye-icon">
        </div>

        <div class="terms">
          <input type="checkbox" name="remember" id="remember_me">
          <label for="remember_me">Simpan akun <a href="{{ route('password.request') }}" class="forget">Lupa password</a></label>
        </div>

        <button type="submit">Masuk</button>
        <div class="divider">atau menggunakan</div>
        <button type="button" class="google-login">
          <img src="https://lh3.googleusercontent.com/COxitqgJr1sJnIDe8-jiKhxDx1FrYbtRHKJ9z_hELisAlapwE9LUPh6fcXIfb5vwpbMl4xl9H9TRFPc5NOO8Sb3VSgIBrfRYvW6cUA" alt="Google Logo" width="20" style="vertical-align:middle;"> Google
        </button>
      </form>
    </div>

    <!-- Overlay for Background Image -->
    <div class="overlay-container">
      <div class="overlay">
        <img src="{{ asset('source/poster.jpg') }}" alt="Image" class="responsive-image">
      </div>
    </div>
  </div>

  <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
