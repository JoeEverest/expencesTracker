<?php
require("config/config.php");
require("handlers/register_handler.php");
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
    <title>Register</title>
</head>

<body>
    <form method="post" class="form-signin">
        <div class="text-center mb-4">
            <h2 class="h3 mb-3 font-weight-normal">Register</h2>
            <div class="errors">
                <?php
                if (count($error) > 0) {
                    echo '<div class="alert alert-danger" role="alert">';
                    foreach ($error as $value) {
                        echo "<span>" . $value . "</span>";
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </div>
        <div class="form-lable-group">
            <label for="firstName">First Name</label>
            <input class="form-control" type="text" name="firstName" id="inputfirstName" placeholder="First Name">
        </div>
        <div class="form-lable-group">
            <label for="middleName">Middle Name</label>
            <input class="form-control" type="text" name="middleName" id="inputmiddleName" placeholder="Middle Name">
        </div>
        <div class="form-lable-group">
            <label for="lastName">Last Name</label>
            <input class="form-control" type="text" name="lastName" id="inputlastName" placeholder="Last Name">
        </div>
        <div class="form-lable-group">
            <label for="email">Email Adress</label>
            <input class="form-control" type="email" name="email" id="inputemail" placeholder="Email Adress">
        </div>
        <div class="form-lable-group">
            <label for="inputPassword">Password</label>
            <input class="form-control" type="password" name="password1" id="inputPassword" placeholder="Password">
        </div>
        <div class="form-lable-group">
            <label for="password2">Confirm Password</label>
            <input class="form-control" type="password" name="password2" id="inputpassword2" placeholder="Confirm Password">
        </div><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button><br>
        <span>Already have an account? Log in<a href="login.php">here.</a></span>
    </form>
</body>

</html>