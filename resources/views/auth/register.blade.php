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
        <span class="close">&times;</span>
        <h2>Syarat dan Ketentuan</h2>
        <p>Lorem ipsum...</p>
        <button id="setuju-btn" class="setuju-btn">Setuju</button>
      </div>
    </div>

    <div id="error-modal" class="modal">
        <span class="close">&times;</span>
        <h2>error kocak</h2>

    </div>

    <!-- Register Form -->
    <div class="form-container register-container">
      <form action="{{ route('register') }}" method="POST">
        @csrf
        <img class="logo" src="{{ asset('source/Logo.png') }}" alt="logo pantausam">
        <h2>Buat akun</h2>
        <p>Sudah punya akun? <a href="#" class="ghost" id="login">Log in</a></p>

        <div class="input-group">
          <input id="name" type="text" name="name" placeholder="Nama" value="{{ old('name') }}" required>
          @if ($errors->has('name'))
                <span class="error-message">{{ $errors->first('name') }}</span>
              @endif
        </div>

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
        <span class="error-message">{{ $errors->first('email') }}</span>
        @endif

        <div class="input-password-group">
          <input  id="password-input" type="password" name="password" placeholder="Password" required>
          <img id="register-toggle-password" src="{{ asset('source/eye-slash-svgrepo-com.svg') }}" alt="Show Password" class="eye-icon">
          @if ($errors->has('password'))
                <span class="error-message">{{ $errors->first('password') }}</span>
              @endif
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
