<?php
require('config/config.php');
require('session.php');
require('handlers/verification_handler.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link rel="stylesheet" href="assets/css/floating-labels.css">
    <title>Verify Email</title>
</head>

<body>

    <div class="form-signin">
    <center>
    <form method="post">
        <p>A verification code has been sent to <?php echo $user; ?>.</p>
        <p>Can't see email? <button name="resend" class="btn btn-sm btn-warning">Resend</button></p>
    </form>
    </center>
    <form method="post">
        <div class="text-center mb-4">
            <div class="errors">
                <?php
                if ($errors) {
                    echo '<div class="alert alert-danger" role="alert">';
                    foreach ($errors as $value) {
                        echo "<span>" . $value . "</span>";
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="form-group">
            <label for="verificationCode">Verification Code</label>
            <input type="number" class="form-control" name="code" id="inputVerificationCode" placeholder="Verification code">
        </div>
        <button type="submit" name="verify" class="btn btn-lg btn-primary btn-block">Verify Account</button>
    </form>
    </div>

</body>

</html>