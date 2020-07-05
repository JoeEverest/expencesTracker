<?php
require('config/config.php');
require('session.php');
require('handlers/verification_check_handler.php');
$errors = array();
$message = array();
require('handlers/add_expenses_handler.php');
require('handlers/add_income_handler.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        * {
            font-family: 'Open Sans', sans-serif;
        }

        body {
            background-image: url("assets/images/kilian-karger-DxEVzwJGzCI-unsplash.jpg");
            background-size: cover;
            background-position: center;
        }

        .left,
        .right {
            margin: 10px 0;
        }

        .container {
            margin-top: 10px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 2px 3px 17px 10px #444141;
        }

        .row {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
    <title>Xpence: Expences Tracker</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Xpence</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="change_password.php">Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <br>
        <center>
            <h3>Expences Tracker</h3>
            <hr>
        </center>
        <div class="row">

            <div class="left col-md-6">
                <form method="post">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="income_name" placeholder="Income Name">
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="income_amount" placeholder="Income Amount">
                        </div>
                        <button type="submit" name="add_income" class="btn btn-danger">Add Income</button>
                    </div>
                </form>
            </div>
            <div class="right col-md-6">
                <form method="post">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" name="expence_name" placeholder="Expence Name">
                        </div>
                        <div class="col">
                            <input type="number" class="form-control" name="expence_amount" placeholder="Expence Amount">
                        </div>
                        <button type="submit" name="add_expence" class="btn btn-success">Add Expence</button>
                    </div>
                </form>
            </div>

            <div class="col-md-12">
                <center>
                    <form method="get">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-8">
                                <select name="tag" class="form-control">
                                    <option value="">--- FILTER BY TAG ---</option>
                                    <?php
                                    $getTags = mysqli_query($connect, "SELECT `transaction_name` FROM `transactions` WHERE `user` = '$user' AND `transaction_type` = 'EXPENCE' GROUP BY `transaction_name` ORDER BY `transaction_name`");
                                    while ($tags = mysqli_fetch_array($getTags)) {
                                        $tagName = $tags['transaction_name'];
                                    ?>
                                        <option value="<?php echo $tagName; ?>"><?php echo $tagName; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success">Add Expence</button>
                            </div>
                        </div>
                    </form>
                </center>
            </div>

        </div>
        <br>
        <?php
        $getBalanceData = mysqli_query($connect, "SELECT balance FROM transactions WHERE user = '$user' ORDER BY id DESC LIMIT 1");
        $balanceData = mysqli_fetch_array($getBalanceData);
        $currentBalance = $balanceData['balance'];
        ?>
        <center>
            <h4>Current Balance: <?php echo number_format($currentBalance) . '/='; ?></h4>
        </center>
        <?php
        if ($errors) {
            echo '<center><div class="alert alert-danger" role="alert">';
            foreach ($errors as $value) {
                echo "<span>" . $value . "</span>";
            }
            echo '</div></center>';
        }
        if ($message) {
            echo '<center><div class="alert alert-success" role="alert">';
            foreach ($message as $value) {
                echo "<span>" . $value . "</span>";
            }
            echo '</div></center>';
        }
        ?>
        <br>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <center>
                    <h4>Incomes</h4>
                </center>
                <hr>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <th>Date</th>
                        <th>Lable</th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $getIncomesQuery = mysqli_query($connect, "SELECT * FROM transactions WHERE user = '$user' AND transaction_type = 'INCOME' ORDER BY id DESC");
                        while ($getIncomeData = mysqli_fetch_array($getIncomesQuery)) {
                            $date = $getIncomeData['date'];
                            $transactionName = $getIncomeData['transaction_name'];
                            $amount = $getIncomeData['amount'];
                            $total = $total + $amount;
                        ?>
                            <tr>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $transactionName; ?></td>
                                <td><?php echo number_format($amount) . "/="; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <th colspan="2">Total Earnings</th>
                            <th><?php echo number_format($total) . "/="; ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <center>
                    <h4>Expenses</h4>
                </center>
                <hr>
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <th>Date</th>
                        <th>Lable</th>
                        <th>Amount</th>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        if (isset($_GET['tag'])) {
                            $tagname = $_GET['tag'];
                            $getExpencesQuery = mysqli_query($connect, "SELECT * FROM transactions WHERE user = '$user' AND transaction_name = '$tagname' AND transaction_type = 'EXPENCE' ORDER BY id DESC");
                        } else {
                            $getExpencesQuery = mysqli_query($connect, "SELECT * FROM transactions WHERE user = '$user' AND transaction_type = 'EXPENCE' ORDER BY id DESC");
                        }
                        while ($getExpencesData = mysqli_fetch_array($getExpencesQuery)) {
                            $date = $getExpencesData['date'];
                            $transactionName = $getExpencesData['transaction_name'];
                            $amount = $getExpencesData['amount'];
                            $total = $total + $amount;
                        ?>
                            <tr>
                                <td><?php echo $date; ?></td>
                                <td><?php echo $transactionName; ?></td>
                                <td><?php echo number_format($amount) . "/="; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <th colspan="2">Total Expenditure</th>
                            <th><?php echo number_format($total) . "/="; ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>