<?php
session_start();
include 'layoutRes/header.php';

?>
<!-- Nested Row within Card Body -->
<div class="row">
  <div class="p-5" style="width:100%">
    <div class="text-center">
      <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
      <?php

      if (isset($_COOKIE["message"])) {
        echo $_COOKIE["message"];
      }
      ?>

    </div>
    <form class="user" method="POST" action="core/login_cek.php">
      <div class="form-group">
        <input type="username" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" required>
      </div>
      <div class="form-group">
        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" required>
      </div>
      <div class="form-group">
        <div class="custom-control custom-checkbox small">
          <input type="checkbox" class="custom-control-input" id="customCheck">
          <label class="custom-control-label" for="customCheck">Remember Me</label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
      <div class="text-center">
        <a class="small" href="register.html">Create an Account!</a>
      </div>
  </div>

</div>

<?php include 'layoutRes/footer.php'; ?>