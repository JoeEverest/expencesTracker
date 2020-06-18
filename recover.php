    <?php
    include("config/config.php");
    include("handlers/recovery_handler.php");
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
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
        <?php
        if (isset($_GET['email'])) {
            $email = $_GET['email'];

        ?>

            <form method="post">
                <input type="email" readonly name="email" value="<?php echo $email; ?>">
                <input type="text" inputmode="numeric" name="key" pattern="[0-9]*" placeholder="Recovery Key">
                <input type="password" name="password1" placeholder="Password">
                <input type="password" name="password2" placeholder="Confirm Password">
                <button type="submit" name="recover">Recover Account</button>
            </form>

        <?php
        } else {
        ?>

            <form method="get">
                <input type="email" name="email" placeholder="Email Address">
                <button type="submit">Proceed</button>
            </form>

        <?php
        }
        ?>
    </body>

    </html>