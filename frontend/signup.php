<?php
require_once('../database/dbhelper.php');
$pw = true;
//Sign up
$username = $email = $password = $confirmpassword = '';
if (!empty($_POST)) {
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
    };
    if($confirmpassword == $password) {
        $sql = 'insert into account(username, email, password, confirmpassword ) values ("' . $username . '", "' . $email . '", "' . $password . '", "' . $confirmpassword . '")';
        execute($sql);
        echo '<script>alert("Registration Successful!")</script>';
    }
    else {
        $pw = false;
    };
};
