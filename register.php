<?php

include 'includes/db.php';
include 'includes/auth.php';
include 'includes/header.php';

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $stmt = $conn->prepare(
        "INSERT INTO users
        (username,email,password)
        VALUES (?,?,?)"
    );

    $stmt->bind_param(
        "sss",
        $username,
        $email,
        $password
    );

    if($stmt->execute())
    {
        $message = "Registration Successful";
    }
    else
    {
        $message = "User already exists";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="auth-container">

<h2>Create Account</h2>

<p><?php echo $message; ?></p>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="email"
name="email"
placeholder="Email"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button type="submit">
Register
</button>

</form>

<a href="login.php">
Already have an account?
</a>

</div>

</body>
</html>
