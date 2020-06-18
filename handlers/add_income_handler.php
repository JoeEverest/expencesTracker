<?php
if (isset($_POST['add_income'])) {
    if (!$_POST['income_amount'] | !$_POST['income_name']) {
        array_push($errors, "All input fields are required");
    } else {
        $incomeName = $_POST['income_name'];
        $incomeAmount = $_POST['income_amount'];
        $time = date("Y-m-d");

        $getData = mysqli_query($connect, "SELECT balance FROM transactions WHERE user = '$user ORDER BY id DESC LIMIT 1");
        $balancedata = mysqli_fetch_array($getData);

        $balance = $balancedata['balance'] + $incomeAmount;

        $insertQuery = "INSERT INTO transactions VALUES ('', '$incomeName', 'INCOME', '$incomeAmount', '$balance', '$time', '$user')";

        if (mysqli_query($connect, $insertQuery)) {
            array_push($message, "Income added Successfully! 🎉");
        } else {
            array_push($errors, "There was an error. 😐");
        }
    }
}
?>