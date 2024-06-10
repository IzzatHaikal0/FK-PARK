<?php
session_start();

// Prevent caching
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Pragma: no-cache"); // HTTP/1.0
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LETSPARKK</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&amp;display=swap'>
    <link rel="stylesheet" href="Login_style.css">
</head>
<body>
    <form method="POST" action="LoginHandler.php">
        <div class="screen-1">
            <div class="image">
                <img src="UMPLogo.png" alt="FKOM">
            </div>
            <div class="email">
                <label for="email">UserName</label>
                <div class="sec-2">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="text" name="FullName" placeholder="Username"/>
                </div>
            </div>
            <div class="password">
                <label for="password">Password</label>
                <div class="sec-2">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input class="pas" type="password" name="ID" placeholder="············"/>
                    <ion-icon class="show-hide" name="eye-outline"></ion-icon>
                </div>
            </div>
            <div class="password">
                <label for="password">Type Of User</label>
                <div class="sec-2">
                    <select name="typeuser" id="typeuser">
                        <option value="Staff">Staff</option>
                        <option value="Unit Keselamatan Staff">Unit Keselamatan Staff</option>
                        <option value="Student">Student</option>
                    </select>
                </div>
            </div>
            <input type="submit" value="Login" class="login">
            
        </div>
    </form>
    <?php
    if (isset($_SESSION['ERRMSG_ARR'])) {
        echo '<ul>';
        foreach ($_SESSION['ERRMSG_ARR'] as $msg) {
            echo "<li>$msg</li>";
        }
        echo '</ul>';
        unset($_SESSION['ERRMSG_ARR']);
    }
    ?>
</body>
</html>
