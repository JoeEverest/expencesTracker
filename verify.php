<?php
include('config/config.php');
include('session.php');
include('handlers/verification_handler.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
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
        <p>A verification code has been sent to <?php echo $user; ?>.</p>
        <p>Can't see email? <button name="resend">Resend</button></p>
    </form>
    <form method="post">
        <input type="number" name="code" placeholder="Verification code">
        <button type="submit" name="verify">Verify Account</button>
    </form>

</body>

</html>