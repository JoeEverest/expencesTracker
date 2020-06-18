<?php
$errors = array();
if (isset($_POST['recover'])) {
    if (!$_POST['email']) {
        array_push($errors, "The email is required");
    } else {
        $email = $_POST['email'];

        $query = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");
        $number = mysqli_num_rows($query);

        if ($number == 1) {
            $key = rand(100000, 999999);
            $msg = "Your recovery key is " . $key;
            mail($email, "Verification Code", $msg);

            $insertQuery = "INSERT INTO recovery VALUES ('', '$email', '$key', 'ACTIVE')";
            $insert = mysqli_query($connect, $insertQuery);
            if (mysqli_query($connect, $insert)) {
                header("Location: recover.php?email=" . $email);
            } else {
                echo mysqli_error($connect);
                echo 'There was an error ' . $error;
            }
        } else {
            array_push($errors, "Account doesn't exist");
        }
    }
}

?>