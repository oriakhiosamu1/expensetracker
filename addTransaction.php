<?php
$errors = ['amount' => '','name' => '', 'date' => ''];

$transactionType = '';
$name = $date = $amount = '';


if(isset($_POST['submit'])) {

$transactionType =  $_POST['transactionType'];


 //amount check
 if(empty($_REQUEST['amount'])) {
  $errors['amount'] = 'Amount is required';
 }

 else {
  $amount = $_REQUEST['amount'];
 }

  //name check
  if(empty($_REQUEST['transactionName'])) {
   $errors['name'] = 'Name is required';
  }

  else {
   $name = $_REQUEST['transactionName'];
  }

    //date check
    if(empty($_REQUEST['date'])) {
     $errors['date'] = 'Date is required';
    }

    else {
     $date = $_REQUEST['date'];
    }
    

    
if(array_filter($errors)) {
 //errors in form
 }
 
 else {
     header('Location: transaction.php');
 }


// define variables and set to empty values
// $title = $description = $amount = $transaction_type = "";
// $titleErr = $descriptionErr = $amountErr = "";
// $userid = $_SESSION['user_id'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
//   $amount = test_input($_POST["amount"]);
//   $transactionName = test_input($_POST["transactionName"]);
//   $date = abs(test_input($_POST["date"]));

    //connect to database
    require_once('./database/connect.php');


  $transaction_type = test_input($_POST["transaction_type"]);
  $sql = "INSERT INTO tp (name,transaction_type,amount, date) VALUES('$name','$transaction_type', '$amount', '$date')";

  if(mysqli_query($db, $sql)){
      header('Location: dashboard.php');
  }else {
      echo 'There is an error in connection: ' . mysqli_connect_error();
  }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}








 }
  


?>





<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <script defer src="expend.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>modal</title>
</head>
<body>

<!-- The side-menu is a section where the user can toggle to go to other pages namely index,income,expense,transaction pages -->
 <!-- start of side menu -->
<div class="side-menu">
    <ul style="margin-bottom: -2vh;margin-top:-3.6vh;margin-left: 1vw;">
            <li>
        <div class="brand-name">
            
              
            <h1><a href="index.php">e-Track</a></h1>
        
     
        </div>
    </li>
</ul>

        <ul>
            <a href="/Expend/index.php"><li><i class="fa-solid fa-house"></i> &nbsp; &nbsp;Home</li></a>
            <a href="/Expend/transaction.php"><li> <i class="fa-solid fa-chart-line"></i> &nbsp; &nbsp;Transactions</li></a>
            <a href="/Expend/income.php"><li> <i class="fa-solid fa-user"></i> &nbsp; &nbsp;Income</li></a>
            <a href="/Expend/expense.php"><li> <i class="fa-sharp fa-solid fa-gear"></i> &nbsp; &nbsp;Expenses</li></a>
        </ul>
        <ul style="position:relative; top:43.5vh;margin-left: 1vw;">
            <a href="#" class="logOutLink"> <li>Log out</li></a>
         </ul>
    </div> 
    <!-- end of side menu -->
    <!-- The is the section/page where users can add a transaction, which will reflect in the transaction.php page -->
    <!-- <form method="POST" action="addTransaction.php"> -->

    <div class="container-m transition-fade incomeModal" id='swup'>
<form method="POST" action="addTransaction.php" class="modal">
<!-- <?php
echo $transactionType;
?> -->
    <h1 style="font-weight:500;font-size:2.5em;">Add Transaction</h1>
    <p style="text-align: center;">Details</p>
    <div><hr style="border-top: 1px solid #929292; border-bottom: none;"></div>
  
    <p>Type</p>
<!-- User will select between Income or Expense with the subsequent radio buttons -->
    <div style="display:flex; align-items:center; gap:15px;"><div><input type="radio"  checked name="transactionType"> Income</div> <div><input type="radio" name="transactionType"> Expense</div></div>
    <div>
     <!-- User will enter an amount in the subsequent input field named 'amount' -->
    <div class="modalL"><label for="amount">Amount</label></div>
    
    <div><input type="number" value="<?php echo $amount?>" placeholder="$00.00" id="amount" name='amount' class="modalInput"></div>
    <div class="inputError"><?php echo $errors['amount'] ?></div>
   </div>
    <div>
     <!--User will enter a name for the transaction in the subsequent input field named 'transactionName'-->
    <div class="modalL"><label for="name">Name</label></div>
    <div><input type="text" value="<?php echo $name?>" placeholder="Name" id="name" name='transactionName' class="modalInput"></div>
    <div class="inputError"><?php echo $errors['name'] ?></div>
   </div>
    <div>
    <!-- User will enter a date in the subsequent input field named 'date' -->
    <div class="dateL"><label for="date">Date</label></div>
    <div><input value="<?php echo $date?>" placeholder type="date" id="date" name='date'></div>
    <div class="inputError"><?php echo $errors['date'] ?></div>
    </div>
    <div>
     <!-- The subsequent button creates he transaction for the user and adds it to the database, and the transaction reflects on the transactions page -->
    <p style="float:right;"><input type='submit' name='submit' value="Create" class="createBtn"/></p>

    </div>

</form>

    </div>
    
</body>
</html>