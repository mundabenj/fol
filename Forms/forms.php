<?php
class forms {
    public function signup() {
 ?>
 <form action='submit.php' method='post'>
    <label for='username'>Username:</label>
    <input type='text' id='username' name='username' required><br><br>
    <label for='email'>Email:</label>
    <input type='email' id='email' name='email' required><br><br>
    <label for='password'>Password:</label>
    <input type='password' id='password' name='password' required><br><br>
    <?php echo $this->submit_button('Sign Up'); ?> <a href='login.php'>Already have an account? Log in</a>
</form>
<?php
    }
    private function submit_button($text) {
        return "<button type='submit'>$text</button>";
    }

    public function signin() {
?>
<form action='login.php' method='post'>
    <label for='username'>Username:</label>
    <input type='text' id='username' name='username' required><br><br>
    <label for='password'>Password:</label>
    <input type='password' id='password' name='password' required><br><br>
    <?php echo $this->submit_button('Sign In'); ?> <a href='./'>Don't have an account? Sign up</a>
</form>
<?php
    }
}   
