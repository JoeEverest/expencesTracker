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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400;1,600&display=swap"
      rel="stylesheet"
    />
    <!-- js -->
    <script
      type="text/javascript"
      src="http://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=-mYb8_AHNnEyNtzLVCbsL1J_XL76vLSamaInDavmEM73NZILqDkp5w8-rfXmGT7WJBJ6CfNmNYP9b2neGXvfPw"
      charset="UTF-8"
    ></script>
    <link
      rel="stylesheet"
      crossorigin="anonymous"
      href="http://gc.kis.v2.scr.kaspersky-labs.com/E3E8934C-235A-4B0E-825A-35A08381A191/abn/main.css?attr=aHR0cDovL2xvY2FsaG9zdDozMDAwL2luZGV4LnBocA"
    />
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
    <!-- css -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/css/native.css" />
    <title>Xpence: Expences Tracker</title>
  </head>
  <body>
    <div
      class="modal fade"
      id="addIncome"
      tabindex="-1"
      aria-labelledby="addIncomeLabel"
      aria-hidden="true"
      data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addIncomeLabel">Add Income</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  name="income_name"
                  placeholder="Income Name"
                />
              </div>
              <div class="form-group">
                <input
                  type="number"
                  class="form-control"
                  name="income_amount"
                  placeholder="Income Amount"
                />
              </div>
              <button type="submit" name="add_income" class="btn btn-danger">
                Add Income
              </button>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="addExpenses"
      tabindex="-1"
      aria-labelledby="addExpensesLabel"
      aria-hidden="true"
      data-backdrop="static"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addExpensesLabel">Add Expences</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  name="expence_name"
                  placeholder="Expence Name"
                />
              </div>
              <div class="form-group">
                <input
                  type="number"
                  class="form-control"
                  name="expence_amount"
                  placeholder="Expence Amount"
                />
              </div>
              <button type="submit" name="add_expence" class="btn btn-success">
                Add Expence
              </button>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="wrapper">
      <div class="top-bar">
        <h4 class="logo">Xpence</h4>
        <button
          type="button"
          class="filter"
          data-toggle="modal"
          data-target="#filters"
        >
          <img src="assets/icons/tune-24px.svg" alt="Filter" />
        </button>
      </div>
      <div class="balance">
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
      </div>
      <div class="bottom-bar">
        <div class="icons active" id="income">
          <img src="assets/icons/input-24px.svg" alt="Incomes" />
          <p>Incomes</p>
        </div>
        <div class="icons" id="expence">
          <img src="assets/icons/payment-24px.svg" alt="Expences" />
          <p>Expenses</p>
        </div>
        <a class="icons" href="settings.php">
          <img src="assets/icons/settings-24px.svg" alt="Incomes" />
          <p>Settings</p>
        </a>
      </div>
      <div class="buttons">
        <button
          type="button"
          data-toggle="modal"
          data-target="#addIncome"
          class="button"
        >
          Add Incomes
        </button>
        <button
          type="button"
          data-toggle="modal"
          data-target="#addExpenses"
          class="button"
        >
          Add Expenses
        </button>
      </div>
      <br />
      <div class="tables">
        <div class="incomes" id="incomes">
          <center>
            <h4>Incomes</h4>
          </center>
          <hr />
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
                    <th colspan="2">Total Earnings:</th>
                    <th><?php echo number_format($total) . "/="; ?></th>
                </tr>
            </tbody>
          </table>
        </div>
        <div class="display-none expences" id="expences">
          <center>
            <h4>Expenses</h4>
          </center>
          <hr />
          <table class="table table-striped">
            <thead class="thead-dark">
              <th>Date</th>
              <th>Lable</th>
              <th>Amount</th>
            </thead>
            <tbody>
                <?php
                $total = 0;
                if (isset($_GET['from']) && isset($_GET['to'])) {
                    $from = $_GET['from'];
                    $to = $_GET['to'];
                    if (isset($_GET['tag'])) {
                        if ($_GET['tag'] == "") {
                            header("Location: index.php");
                        } else {
                            $tagname = $_GET['tag'];
                            $getExpencesQuery = mysqli_query($connect, "SELECT * FROM transactions WHERE user = '$user' AND transaction_name = '$tagname' AND transaction_type = 'EXPENCE' AND date >= '$from' AND date <= '$to' ORDER BY id DESC");
                        }
                    } else {
                        $getExpencesQuery = mysqli_query($connect, "SELECT * FROM transactions WHERE user = '$user' AND transaction_type = 'EXPENCE' AND date >= '$from' AND date <= '$to'  AND date >= '$from' AND date <= '$to' ORDER BY id DESC");
                    }
                } else {
                    if (isset($_GET['tag'])) {
                        if ($_GET['tag'] == "") {
                            header("Location: index.php");
                        } else {
                            $tagname = $_GET['tag'];
                            $getExpencesQuery = mysqli_query($connect, "SELECT * FROM transactions WHERE user = '$user' AND transaction_name = '$tagname' AND transaction_type = 'EXPENCE' ORDER BY id DESC");
                        }
                    } else {
                        $getExpencesQuery = mysqli_query($connect, "SELECT * FROM transactions WHERE user = '$user' AND transaction_type = 'EXPENCE' ORDER BY id DESC");
                    }
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
                    <th colspan="2">Total Expenditure:</th>
                    <th><?php echo number_format($total) . "/="; ?></th>
                </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="filters"
      tabindex="-1"
      aria-labelledby="filtersLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="filtersLabel">Filters</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="get">
              <h4>Filter by Date</h4>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="from-date">From: </label>
                    <input
                      type="date"
                      name="from"
                      class="form-control"
                      id="from-date"
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="to-date">To: </label>
                    <input
                      type="date"
                      name="to"
                      class="form-control"
                      id="to-date"
                    />
                  </div>
                </div>
              </div>
              <button type="submit" class="col-sm-10 btn btn-success">
                Filter
              </button>
            </form>
            <hr />
            <form method="get">
              <h4>Filter by Tags</h4>

              <div class="row">
                <div class="col-md-8">
                  <select name="tag" class="form-control">
                    <option value="">--- FILTER BY TAGS ---</option>
                    <?php
                                $getTags = mysqli_query($connect, "SELECT `transaction_name` FROM `transactions` WHERE `user` = '$user' AND `transaction_type` = 'EXPENCE' GROUP BY `transaction_name` ORDER BY `transaction_name`");
                                while ($tags = mysqli_fetch_array($getTags)) {
                                    $tagName = $tags['transaction_name'];
                                ?>
                    <option value="<?php echo $tagName; ?>">
                      <?php echo $tagName; ?>
                    </option>
                    <?php
                                }
                                ?>
                  </select>
                </div>
                <div class="col-md-2"></div>
                <div class="col">
                  <br />
                  <button type="submit" class="btn btn-warning">
                    Filter By Tag
                  </button>
                  <a href="index.php" class="btn btn-info">Reset Filter</a>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      $("#expence").click(function () {
        $("#incomes").addClass("display-none");
        $("#expence").addClass("active");
        $("#expences").removeClass("display-none");
        $("#income").removeClass("active");
      });
      $("#income").click(function () {
        $("#expences").addClass("display-none");
        $("#income").addClass("active");
        $("#incomes").removeClass("display-none");
        $("#expence").removeClass("active");
      });
    </script>
  </body>
</html>
