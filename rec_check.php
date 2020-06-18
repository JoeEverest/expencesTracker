<?php
include("config/config.php");
include("handlers/recovery_check_handler.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Password</title>
</head>

<body>
    <form method="post">
        <input type="email" required name="email" placeholder="Email Address">
        <button type="submit" name="recover">Recover Password</button>
    </form>
</body>

</html>