<?php
$errors = array();

if (isset($_POST['login'])) {
    if (!$_POST['email'] | !$_POST['password']) {
        array_push($errors, "All input fields are required");
    } else {
        $email = $_POST['email'];
        $password = sha1(md5(urlencode($_POST['password'])));

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Invalid email format");
        } else {
            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $query = mysqli_query($connect, $query);
            $num = mysqli_num_rows($query);

            if ($num == 1) {
                $_SESSION['email'] = $email;
                header("Location: index.php");
            } else {
                array_push($errors, "Email or password incorrect");
            }
        }
    }
}
?>