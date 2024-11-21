<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Double Slider Login / Registration Form</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container" id="container">

    <div class="form-container login-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img class="logo"src="source/Logo.png" alt="logo pantausam">
        <h2>Masuk akun</h2>
        <p>Sudah punya akun? <a href="#" class="ghost" id="register">Log in</a></p>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
            <span class="error-message">{{ $errors->first('email') }}</span>
            @endif
            <div class="input-password-group">
                <input id="password-input" type="password" name="password" placeholder="Password" required>
                <img id="login-toggle-password" src="{{ asset('source/eye-slash-svgrepo-com.svg') }}" alt="Show Password" class="eye-icon">
              </div>
              @if ($errors->has('password'))
                <span class="error-message">{{ $errors->first('password') }}</span>
              @endif
                    <div class="terms">
                        <label for="remember_me">
                          <input id="remember_me" type="checkbox" name="remember">
                          <span>{{ __('Remember me') }}</span>
                        </label>
                        @if (Route::has('password.request'))
                          <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                        @endif
                      </div>

                      <button type="submit">Masuk</button>

                    <div class="divider">atau menggunakan</div>
                    <button class="google-login">
                    <img src="https://lh3.googleusercontent.com/COxitqgJr1sJnIDe8-jiKhxDx1FrYbtRHKJ9z_hELisAlapwE9LUPh6fcXIfb5vwpbMl4xl9H9TRFPc5NOO8Sb3VSgIBrfRYvW6cUA" alt="Google Logo" width="20" style="vertical-align:middle;"> Google
        </button>
      </form>
      <div id="error-modal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <p id="error-message">Password yang Anda masukkan salah.</p>
        </div>
      </div>

    </div>

    <div class="overlay-container">


      <div class="overlay">

        <img src="source/poster.jpg" alt="Image" class="responsive-image">
      </div>
    </div>
    <div id="error-modal" class="modal" style="display: none;">
        <div class="modal-content">
          <span class="close">&times;</span>
          <p id="error-message">Password yang Anda masukkan salah.</p>
        </div>
      </div>

  </div>

  <script src="js/login.js"></script>

</body>
</html>
