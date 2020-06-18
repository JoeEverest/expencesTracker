<?php
$errors = array();
if (isset($_POST['recover'])) {
    if (!$_POST['email'] | !$_POST['key'] | !$_POST['password1'] | !$_POST['password2']) {
        array_push($errors, "All input fields are required");
    } else {
        $recEmail = $_POST['email'];

        $getData = mysqli_query($connect, "SELECT * FROM recovery WHERE email = '$recEmail' AND status = 'ACTIVE' ORDER BY id DESC LIMIT 1");
        $num = mysqli_num_rows($getData);
        
        if ($num == 1) {
            $data = mysqli_fetch_array($getData);
            $key = $data['recovery_key'];

            $inputKey = $_POST['key'];

            if ($key == $inputKey) {
                $pass1 = sha1(md5(urlencode($_POST['password1'])));
                $pass2 = sha1(md5(urlencode($_POST['password2'])));

                if ($pass1 == $pass2) {
                    if (strlen($_POST['password1']) < 8) {
                        array_push($errors, "New Password has to be over 8 characters long");
                    } else {
                        $updatePassword = mysqli_query($connect, "UPDATE `users` SET `password` = '$pass1' WHERE email = '$recEmail'");
                        $disableKey = mysqli_query($connect, "UPDATE `recovery` SET `status` = 'INACTIVE' WHERE email = '$recEmail'");
                        header("Location: login.php");
                    }
                } else {
                    array_push($errors, "Passwords Don't match");
                }
            } else {
                array_push($errors, "Recovery Key Incorrect");
                $msg = "Your recovery key is " . $key;
                mail($email, "Verification Code", $msg);
            }
        } else {
            header("Location: rec_check.php");
        }
    }
}
?>