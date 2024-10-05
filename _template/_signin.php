<?php
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = validate_user($email , $password);
    if($result){
    ?>
        <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Login Success</h1>
            <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS.</p>
            <p>Use <a href="../examples/sticky-footer-navbar/">the sticky footer with a fixed navbar</a> if need be, too.</p>
        </div>
        </main>
    <?
    } else {
?>
<main class="form-signin w-100 m-auto">
  <form method="post" action="test.php">
    <img class="mb-4" src="/snaclass/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email"name='email' class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name='password' class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-check text-start my-3">
      <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
      <label class="form-check-label" for="flexCheckDefault">
        Remember me
      </label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
  </form>
</main>
<? } ?>