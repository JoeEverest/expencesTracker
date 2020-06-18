<?php
$error = array();
if (isset($_POST['register'])) {
    if (!$_POST['firstName'] | !$_POST['middleName'] | !$_POST['lastName'] | !$_POST['email'] | !$_POST['password1'] | !$_POST['password2']) {
        array_push($error, "All input Fields are Required");
    } else {
        $firstname = urlencode($_POST['firstName']);
        $middlename = urlencode($_POST['middleName']);
        $lastname = urlencode($_POST['lastName']);

        if (!preg_match("/^[a-zA-Z ]*$/", $firstname) | !preg_match("/^[a-zA-Z ]*$/", $middlename) | !preg_match("/^[a-zA-Z ]*$/", $lastname)) {
            array_push($error, "Only letters and white space allowed");
        } else {
            $fullName = $firstname . ' ' . $middlename . ' ' . $lastname;

            $email = $_POST['email'];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($error, "Invalid email format");
            } else {
                $query = "SELECT * FROM users WHERE email = '$email'";
                $query = mysqli_query($connect, $query);

                $number = mysqli_num_rows($query);
                if ($number > 0) {
                    array_push($error, "The user with the email '$email' already exists, <a href='login.php'>log in</a> instead?");
                } else {
                    $password1 = sha1(md5(urlencode($_POST['password1'])));
                    $password2 = sha1(md5(urlencode($_POST['password2'])));

                    if ($password1 != $password2) {
                        array_push($error, "Passwords don't match");
                    } else {
                        if (strlen($password1) < 8) {
                            array_push($error, "Password should be at least 8 characters long");
                        } else {

                            $query = "INSERT INTO users VALUES ('', '$fullName', '$email', '$password1', 'PENDING')";

                            if (mysqli_query($connect, $query)) {
                                session_start();
                                $_SESSION['email'] = $email;
                                header("Location: login.php");
                                // exit();
                            } else {
                                echo mysqli_error($connect);
                                echo 'There was an error ' . $error;
                            }
                        }
                    }
                }
            }
        }
    }
}
