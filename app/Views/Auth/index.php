<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="<?= base_url() ?>/auth/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?= base_url('auth/style.css') ?>" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="<?= route_to('login') ?>" method="POST" class="sign-in-form">
          <?= csrf_field() ?>

          <h2 class="title">Sign in</h2>

          <?= view('Myth\Auth\Views\_message_block') ?>

          <div class="input-field">
            <i class="fas fa-user"></i>
            <input autocomplete="off" name="login" type="text" placeholder="Username or Email" />
          </div>

          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input name="password" type="password" placeholder="Password" />
          </div>

          <?php if ($config->allowRemembering) : ?>
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                <?= lang('Auth.rememberMe') ?>
              </label>
            </div>
          <?php endif; ?>

          <input type="submit" value="Login" class="btn solid" />
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <img src="<?= base_url('auth/img/log.svg') ?>" class="image" alt="background" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of us ?</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
            laboriosam ad deleniti.
          </p>
          <button class="btn transparent" id="sign-in-btn">Sign in</button>
        </div>
        <img src="<?= base_url('auth/img/register.svg') ?>" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="<?= base_url('auth/app.js') ?>"></script>
</body>

</html>