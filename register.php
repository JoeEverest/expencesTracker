<?php
include("config/config.php");
include("handlers/register_handler.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>
    <?php
    if ($error) {
        echo '<div class="error"><ul>';
        foreach ($error as $value) {
            echo "<li>" . $value . "</li>";
        }
        echo '</ul></div>';
    }
    ?>
    <form method="post">
        <input type="text" name="firstName" placeholder="First Name">
        <input type="text" name="middleName" placeholder="Middle Name">
        <input type="text" name="lastName" placeholder="Last Name">
        <input type="email" name="email" placeholder="Email Adress">
        <input type="password" name="password1" placeholder="Password">
        <input type="password" name="password2" placeholder="Confirm Password">
        <button type="submit" name="register">Register</button>
    </form>
</body>

</html>