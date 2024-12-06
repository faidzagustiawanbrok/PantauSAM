
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Double Slider Login / Registration Form</title>
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">
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
          <span class="close" id="closeModalBtn">&times;</span>
          <h2>Syarat dan Ketentuan</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut blandit arcu a neque.</p>
          <button id="setuju-btn" class="setuju-btn">Setuju</button>
        </div>
      </div>

    <!-- Register Form -->
    <div class="form-container register-container">
      <form action="{{ route('register') }}" method="POST" autocomplete="off" novalidate>
        @csrf
        <img class="logo" src="{{ asset('source/Logo.png') }}" alt="logo pantausam">
        <h2>Buat akun</h2>
        <p>Sudah punya akun? <a href="{{ route('login') }}" class="ghost">Log in</a></p>

        <!-- Name Input -->
        <input id="name" type="text" name="name" autocomplete="off"placeholder="Nama Lengkap"  required>
        @error('name')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Email Input -->
        <input type="email" name="email" autocomplete="off"placeholder="Email"  required>
        @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <!-- Password Input with Toggle -->
        <div class="input-password-group">
          <input type="password" name="password"autocomplete="off" id="password-input" placeholder="Password" required>
          <img id="register-toggle-password" src="{{ asset('source/eye-slash-svgrepo-com.svg') }}" alt="Show Password" class="eye-icon">
          @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

        </div>

        <!-- Confirm Password Input -->
        <div class="input-password-group">
        <input type="password" name="password_confirmation" id="password-input" placeholder="Konfirmasi Password" required>
        <img id="register-toggle-password" src="{{ asset('source/eye-slash-svgrepo-com.svg') }}" alt="Show Password" class="eye-icon">
        </div>
        <!-- Terms and Conditions -->
        <div class="terms">
            <input type="checkbox" id="terms-checkbox" required>
            <label for="terms-checkbox">Setuju dengan <a href="#" id="terms-link">syarat & ketentuan</a></label>
          </div>


        <!-- Submit Button -->
        <button type="submit">Buat akun</button>

        <!-- Google Login Option -->
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

  <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>
