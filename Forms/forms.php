<?php
class forms {
    public function signup($conf, $ObjFncs) {
      $err = $ObjFncs->getMsg('errors');
 ?>
            <h2>Sign Up Here</h2>
<form action='' method='post' autocomplete="off">
  <div class="mb-3">
    <label for="fullname" class="form-label">Fullname</label>
    <input type="text" class="form-control" id="fullname" name="fullname" aria-describedby="fullnameHelp" maxlength="50" placeholder="Enter your fullname" value="<?php echo (isset($_SESSION['fullname'])) ? $_SESSION['fullname'] : ''; unset($_SESSION['fullname']); ?>" required>
    <div id="fullnameHelp" class="form-text"><?php echo (isset($err['fullname_error'])) ? $err['fullname_error'] : ''; ?></div>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" maxlength="100" placeholder="Enter your email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : ''; unset($_SESSION['email']); ?>" required>
    <div id="emailHelp" class="alert alert-danger"><?php echo (isset($err['mailFormat_error'])) ? $err['mailFormat_error'] : ''; ?></div>
    <div id="emailHelp" class="alert alert-danger"><?php echo (isset($err['mailDomain_error'])) ? $err['mailDomain_error'] : ''; ?></div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
    <div id="passwordHelp" class="alert alert-danger"><?php echo (isset($err['password_length_error'])) ? $err['password_length_error'] : ''; ?></div>
  </div>
  <?php echo $this->submit_button('Sign Up', 'signup'); ?> <a href='signin.php'>Already have an account? Sign in</a>
</form>
<?php
    }
    private function submit_button($value, $name) {
        return "<button type='submit' class='btn btn-primary' name='$name'>$value</button>";
    }
    public function signin() {
?>
            <h2>Sign In Here</h2>
<form action='' method='post'>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password">
  </div>
  <?php echo $this->submit_button('Sign In', 'signin'); ?> <a href='signup.php'>Don't have an account? Sign up</a>
</form>
<?php
    }
}   
