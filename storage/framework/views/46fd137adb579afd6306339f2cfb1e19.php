<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Double Slider Login / Registration Form</title>
  <link rel="stylesheet" href="<?php echo e(asset('css/register.css')); ?>">
</head>
<body>

  <div class="container" id="container">
    <!-- Display Error Messages -->
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <ul>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

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
      <form action="<?php echo e(route('register')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <img class="logo" src="<?php echo e(asset('source/Logo.png')); ?>" alt="logo pantausam">
        <h2>Buat akun</h2>
        <p>Sudah punya akun? <a href="#" class="ghost" id="login">Log in</a></p>

        <div class="input-group">
          <input id="name" type="text" name="name" placeholder="Nama" value="<?php echo e(old('name')); ?>" required>
          <?php if($errors->has('name')): ?>
                <span class="error-message"><?php echo e($errors->first('name')); ?></span>
              <?php endif; ?>
        </div>

        <input type="email" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required>
        <?php if($errors->has('email')): ?>
        <span class="error-message"><?php echo e($errors->first('email')); ?></span>
        <?php endif; ?>

        <div class="input-password-group">
          <input  id="password-input" type="password" name="password" placeholder="Password" required>
          <img id="register-toggle-password" src="<?php echo e(asset('source/eye-slash-svgrepo-com.svg')); ?>" alt="Show Password" class="eye-icon">
          <?php if($errors->has('password')): ?>
                <span class="error-message"><?php echo e($errors->first('password')); ?></span>
              <?php endif; ?>
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
        <img src="<?php echo e(asset('source/poster.jpg')); ?>" alt="Image" class="responsive-image">
      </div>
    </div>
  </div>

  <script src="<?php echo e(asset('js/register.js')); ?>"></script>
</body>
</html>
<?php /**PATH D:\New folder (5)\Multi_auth-user-registration-larvel11\resources\views/auth/register.blade.php ENDPATH**/ ?>