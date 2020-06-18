<?php
include('config/config.php');
include('session.php');
include('handlers/change_password_handler.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>

<body>
    <?php
    if ($errors) {
        echo '<div class="error"><ul>';
        foreach ($errors as $value) {
            echo "<li>" . $value . "</li>";
        }
        echo '</ul></div>';
    }
    ?>
    <form method="post">
        <input type="password" name="passOld" placeholder="Old Password">
        <input type="password" name="passNew1" placeholder="New Password">
        <input type="password" name="passNew2" placeholder="Confirm New Password">
        <button type="submit" name="change">Change Password</button>
    </form>
</body>

</html>