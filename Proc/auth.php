<?php
class auth{
    public function signup($conf, $ObjFncs){
        // Signup logic here
        if(isset($_POST['signup'])){
            $errors = array(); // Initialize an array to hold error messages

            $fullname = $_SESSION['fullname'] = ucwords(strtolower($_POST['fullname']));
            $email = $_SESSION['email'] = strtolower($_POST['email']);
            $password = $_SESSION['password'] = $_POST['password'];
            // Further processing like validation, hashing password, storing in database, etc.

            // Validate fullname
            if (empty($fullname) || !preg_match("/^[a-zA-Z ]*$/", $fullname)) {
                $errors['fullname_error'] = "Only letters and white space allowed in fullname";
            }

            // Verify email format
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['mailFormat_error'] = "Invalid email format";
            }

            // Check if email domain is valid
            $domain = substr(strrchr($email, "@"), 1);
            if (!in_array($domain, $conf['valid_domain'])) {
                $errors['mailDomain_error'] = "Invalid email domain";
            }

            // Verify password length
            if (strlen($password) < $conf['valid_password_length']) {
                $errors['password_length_error'] = "Password must be at least " . $conf['valid_password_length'] . " characters long";
            }

            // Verify if email already exists in the database

            // If there are errors, store them in session and redirect back to signup page
            if (!count($errors)) {
                // No errors, proceed with signup (e.g., store user in database)
                // die($fullname." ".$email." ".$password);
                // Clear session variables after successful signup
                unset($_SESSION['fullname']);
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                $ObjFncs->setMsg('msg', 'Sign up successful! You can now Sign in.', 'success');
            } else {
                $ObjFncs->setMsg('errors', $errors, 'alert alert-danger');
                $ObjFncs->setMsg('msg', 'Please fix the errors below and try again.', 'danger');
            }
        }
    }
    public function signin(){
        // Signin logic here
    }
}