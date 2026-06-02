<?php

include 'includes/db.php';
include 'includes/auth.php';
include 'includes/header.php';

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare(
        "SELECT *
         FROM users
         WHERE email=?"
    );

    $stmt->bind_param(
        "s",
        $email
    );

    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows == 1)
    {
        $user = $result->fetch_assoc();

        if(
            password_verify(
                $password,
                $user['password']
            )
        )
        {
            $_SESSION['user_id']
                = $user['id'];

            $_SESSION['username']
                = $user['username'];

            $_SESSION['role']
                = $user['role'];

            header("Location: index.php");
            exit;
        }
    }

    $message = "Invalid Credentials";
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="auth-container">

<h2>Login</h2>

<p><?php echo $message; ?></p>

<form method="POST">

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
Login
</button>

</form>

<a href="register.php">
Create Account
</a>

</div>

</body>
</html>
