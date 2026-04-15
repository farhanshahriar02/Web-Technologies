<?php 
session_start();

$username = $_POST["username"] ?? "";
$name     = $_POST["name"] ?? "";
$email    = $_POST["email"] ?? "";
$phone    = $_POST["phone"] ?? "";


$hasUsernameError = true;
$hasNameError     = true;
$hasEmailError    = true;
$hasPhoneError    = true;


if(!$username){
    $_SESSION["usernameErr"] = "Username is required";
    $hasUsernameError = true;
}else{
    unset($_SESSION["usernameErr"]);
    $hasUsernameError = false;
}


if(!$name){
    $_SESSION["nameErr"] = "Name is required";
    $hasNameError = true;
}else{
    unset($_SESSION["nameErr"]);
    $hasNameError = false;
}


if(!$email){
    $_SESSION["emailErr"] = "Email is required";
    $hasEmailError = true;
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION["emailErr"] = "Invalid email format";
    $hasEmailError = true;
}else{
    unset($_SESSION["emailErr"]);
    $hasEmailError = false;
}


if(!$phone){
    $_SESSION["phoneErr"] = "Phone is required";
    $hasPhoneError = true;
}else if(!preg_match("/^[0-9]{10,15}$/", $phone)){
    $_SESSION["phoneErr"] = "Invalid phone number";
    $hasPhoneError = true;
}else{
    unset($_SESSION["phoneErr"]);
    $hasPhoneError = false;
}

$_SESSION["username"] = $username;
$_SESSION["name"]     = $name;
$_SESSION["email"]    = $email;
$_SESSION["phone"]    = $phone;

if($hasUsernameError || $hasNameError || $hasEmailError || $hasPhoneError){
    Header("Location: ../View/form.php");
    exit();
}else{
    
    echo "<h1>Registration Successful</h1>";
    echo "<h3>Welcome, $name</h3>";
    echo "<p>Username: $username</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Phone: $phone</p>";
}
?>