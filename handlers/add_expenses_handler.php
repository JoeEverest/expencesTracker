<?php
if (isset($_POST['add_expence'])) {
    if (!$_POST['expence_name'] | !$_POST['expence_amount']) {
        array_push($errors, "All input fields are required");
    } else {
        $expenceName = $_POST['expence_name'];
        $expenceAmount = $_POST['expence_amount'];
        $time = date("Y-m-d H:i:s");

        $getData = mysqli_query($connect, "SELECT balance FROM transactions ORDER BY id DESC LIMIT 1");
        $balancedata = mysqli_fetch_array($getData);

        $balance = $balancedata['balance'] - $expenceAmount;

        $insertQuery = "INSERT INTO transactions VALUES ('', '$expenceName', 'EXPENCE', '$expenceAmount', '$balance', '$time', '$user')";

        if (mysqli_query($connect, $insertQuery)) {
            array_push($message, "Expense added Successfully! 🎉");
        } else {
            array_push($errors, "There was an error. 😐");
        }
    }
}
?>