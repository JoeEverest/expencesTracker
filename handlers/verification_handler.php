<?php
$errors = array();

$exists = mysqli_query($connect, "SELECT * FROM verify WHERE email = '$user'");
$data = mysqli_fetch_array($exists);
$code = $data['code'];
$status = $data['status'];
if ($status != "PENDING") {
    header("Location: index.php");
}

if (isset($_POST['resend'])) {
    $msg = "Your verification code is " . $code;
    mail($user, "Verification Code", $msg);
}
if (isset($_POST['verify'])) {
    if (!$_POST['code']) {
        array_push($errors, "Verification code required");
    } else {
        $inputCode = $_POST['code'];
        if ($code == $inputCode) {
            $update = mysqli_query($connect, "UPDATE `verify` SET `status` = 'APPROVED' WHERE email = '$user'");
            $update2 = mysqli_query($connect, "UPDATE `users` SET `status` = 'APPROVED' WHERE email = '$user'");
            header("Location: index.php");
        } else {
            array_push($errors, "Verification code incorrect");
        }
    }
}
