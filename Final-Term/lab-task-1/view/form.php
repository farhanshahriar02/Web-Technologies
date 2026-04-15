<?php 
session_start();


$usernameError = $_SESSION["usernameErr"] ?? "";
$nameError     = $_SESSION["nameErr"] ?? "";
$emailError    = $_SESSION["emailErr"] ?? "";
$phoneError    = $_SESSION["phoneErr"] ?? "";


$username = $_SESSION["username"] ?? "";
$name     = $_SESSION["name"] ?? "";
$email    = $_SESSION["email"] ?? "";
$phone    = $_SESSION["phone"] ?? "";


unset($_SESSION["usernameErr"]);
unset($_SESSION["nameErr"]);
unset($_SESSION["emailErr"]);
unset($_SESSION["phoneErr"]);

unset($_SESSION["username"]);
unset($_SESSION["name"]);
unset($_SESSION["email"]);
unset($_SESSION["phone"]);
?>

<html>
<head>
    <title>Registration</title>
</head>
<body>

<h2>User Registration</h2>

<form method="post" action="../Controller/formValidation.php">

<table>

<tr>
    <td>Username</td>
    <td>
        <input type="text" name="username" placeholder="Enter username" 
        value="<?php echo $username; ?>"/>
    </td>
    <td><p style="color:red;"><?php echo $usernameError; ?></p></td>
</tr>

<tr>
    <td>Name</td>
    <td>
        <input type="text" name="name" placeholder="Enter name" 
        value="<?php echo $name; ?>"/>
    </td>
    <td><p style="color:red;"><?php echo $nameError; ?></p></td>
</tr>

<tr>
    <td>Email</td>
    <td>
        <input type="text" name="email" placeholder="Enter email" 
        value="<?php echo $email; ?>"/>
    </td>
    <td><p style="color:red;"><?php echo $emailError; ?></p></td>
</tr>

<tr>
    <td>Phone</td>
    <td>
        <input type="text" name="phone" placeholder="Enter phone" 
        value="<?php echo $phone; ?>"/>
    </td>
    <td><p style="color:red;"><?php echo $phoneError; ?></p></td>
</tr>

<tr>
    <td></td>
    <td><input type="submit" name="submit" value="submit"/></td>
</tr>

</table>

</form>

</body>
</html>