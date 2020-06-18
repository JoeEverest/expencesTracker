<?php
$errors = array();
if (isset($_POST['change'])) {
    if (!$_POST['passOld'] | !$_POST['passNew1'] | !$_POST['passNew2']) {
        array_push($errors, "All input fields are reqired");
    } else {
        $passOld = $_POST['passOld'];
        $passOld = sha1(md5($passOld));

        $passNew1 = $_POST['passNew1'];
        $passNew2 = $_POST['passNew2'];

        $qr = mysqli_query($connect, "SELECT * FROM users WHERE email = '$user'");
        $data = mysqli_fetch_array($qr);
        $passDB = $data['password'];

        if ($passNew1 != $passNew2) {
            array_push($errors, "New Passwords don't match");
        } else {
            if (strlen($passNew1) < 8) {
                array_push($errors, "New Password has to be over 8 characters long");
            } else {
                $passNew = sha1(md5(urlencode($passNew1)));

                if ($passDB == $passNew) {
                    array_push($errors, "New Password can't be the same as old password");
                } else {
                    if ($passDB != $passOld) {
                        array_push($errors, "Old password incorrect");
                    } else {
                        $updatePassword = mysqli_query($connect, "UPDATE `users` SET `password` = '$passNew' WHERE email = '$user'");
                        echo "<script>alert('Password Changed successfully')</script>";
                    }
                }
            }
        }
    }
}
?>