<?php
include("config/config.php");
session_start();
include("handlers/login_handler.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>

<body>
    <div class="errors">
        <?php
        if ($errors) {
            echo '<div class="error"><ul>';
            foreach ($errors as $value) {
                echo "<li>" . $value . "</li>";
            }
            echo '</ul></div>';
        }
        ?>
    </div>
    <form method="post">
        <input type="email" name="email" placeholder="Email Address">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="login">Log In</button>
    </form>
</body>

</html>