<?php
require('config/config.php');
require('session.php');
require('handlers/verification_check_handler.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet" />
    <!-- js -->
    <script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=-mYb8_AHNnEyNtzLVCbsL1J_XL76vLSamaInDavmEM73NZILqDkp5w8-rfXmGT7WJBJ6CfNmNYP9b2neGXvfPw" charset="UTF-8"></script>
    <link rel="stylesheet" crossorigin="anonymous" href="http://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cDovL2xvY2FsaG9zdDozMDAwL2luZGV4LnBocA" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <style>
        * {
            font-family: "Open Sans", sans-serif;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            padding: 10px;
        }

        .options {
            list-style: none;
        }

        .options li {
            height: 70px;
            padding: 20px;
            padding-left: 0;
        }

        .options hr {
            margin: 0;
            padding: 0;
        }
    </style>
    <title>Xpence: Settings</title>
</head>

<body>
    <div class="wrapper">
        <div class="top-bar">
            <div class="back">
                <a href="index.php">
                    <img src="assets/icons/keyboard_backspace-24px.svg" alt="Back" />
                </a>
            </div>
            <h4 class="settings">Settings</h4>
        </div>
        <hr>
        <ul class="options">
            <li><a href="change_password.php">
                    <h4>
                        <img src="assets/icons/fingerprint-24px.svg" alt="Change Password" />
                        Change Password
                    </h4>
                </a>
            </li>
            <hr />
            <li><a href="logout.php">
                    <h4>
                        <img src="assets/icons/power_settings_new-24px.svg" alt="Log Out" />
                        Log Out
                    </h4>
                </a>
            </li>
        </ul>
    </div>
</body>

</html>