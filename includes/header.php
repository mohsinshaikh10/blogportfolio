<?php
include_once __DIR__ . '/auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Mohsin Blog</title>

<link rel="stylesheet" href="https://cloudforum.infy.click/css/style.css">

</head>

<body>

<header>

    <div class="logo">
        <a href="index.php">
            Mohsin Blog
        </a>
    </div>

    <nav>

        <ul class="nav-links">

            <li>
                <a href="index.php">
                    Home
                </a>
            </li>

            <li>
                <a href="portfolio.php">
                    Mohsin (Owner)
                </a>
            </li>

            <?php if(isLoggedIn()) : ?>

                <?php if(isAdmin()) : ?>

                <li>
                    <a href="admin/dashboard.php">
                        Dashboard
                    </a>
                </li>

                <?php endif; ?>

                <li>
                    <a href="logout.php">
                        Logout
                    </a>
                </li>

                <li class="welcome-user">
                    <?php echo htmlspecialchars($_SESSION['username']); ?>
                </li>

            <?php else : ?>

                <li>
                    <a href="login.php">
                        Login
                    </a>
                </li>

                <li>
                    <a href="register.php">
                        Register
                    </a>
                </li>

            <?php endif; ?>

        </ul>

    </nav>

</header>

<main>
