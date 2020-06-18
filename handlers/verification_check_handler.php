<?php
    $getStatus = mysqli_query($connect, "SELECT * FROM users WHERE email = '$user'");
    $data = mysqli_fetch_array($getStatus);
    $status = $data['status'];

    if ($status == "PENDING") {
        $exists = mysqli_query($connect, "SELECT * FROM verify WHERE email = '$user'");
        $numRows = mysqli_num_rows($exists);

        if ($numRows == 0) {
            $code = rand(1000, 9999);
            $query = "INSERT INTO verify VALUES ('', '$user', '$code', '$status')";
            $query = mysqli_query($connect, $query);

            $msg = "Your verification code is " . $code;
            mail($user, "Verification Code", $msg);

            header("Location: verify.php");
        } else {
            header("Location: verify.php");
        }
    }
?>