<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = signup($username,$email , $password);
    if($result){
    ?>
        <main class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Sign-Up Success</h1>
            <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS.</p>
            <p>Use <a href="../examples/sticky-footer-navbar/">the sticky footer with a fixed navbar</a> if need be, too.</p>
        </div>
        </main>
    <?
    } else {
?>
<main class="form-signup w-100 m-auto">
  <form method="post" action="signup.php">
    <img class="mb-4" src="/snaclass/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>

    <div class="form-floating">
      <input type="text"name='username' class="form-control" id="floatingInputUsername" placeholder="username">
      <label for="floatingInputUsername">Username</label>
    </div>
    <div class="form-floating">
      <input type="email"name='email' class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" name='password' class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
  </form>
</main>
<? } ?>