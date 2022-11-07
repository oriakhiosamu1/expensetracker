<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
<script defer src="swup.min.js"></script>
<script defer src="expend.js"></script>
<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./Fontawesome/fontawesome-free-6.1.1-web/css/all.min.css" />

    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/2026f77c4a.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
   
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,700;1,800&display=swap" rel="stylesheet">
</head>
<body>
 <!-- The side-menu is a section where the user can toggle to go to other pages namely index,income,expense,transaction pages -->
 <!-- start of side menu -->
    <div class="side-menu">
        <ul style="margin-bottom: -2vh;margin-top:-3.6vh;margin-left: 1vw;">
            <li>
        <div class="brand-name" style="display:flex; justify-content:space-between; width:100vw;">
            
              
            <h1><a href="index.php">e-Track</a></h1>
            <h2 style="cursor:pointer;" class="sideToggler">&#9776;</h2>
        
     
        </div>
    </li>
</ul>
        <ul>
            <a href="index.php"><li><i class="fa-solid fa-house"></i> &nbsp; &nbsp;Home</li></a>
            <a href="transaction.php"><li> <i class="fa-solid fa-chart-line"></i> &nbsp; &nbsp;Transactions</li></a>
            <a href="income.php"><li> <i class="fa-solid fa-user"></i> &nbsp; &nbsp;Income</li></a>
            <a href="expense.php"><li> <i class="fa-sharp fa-solid fa-gear"></i> &nbsp; &nbsp;Expenses</li></a>
            <a href="addTransaction.php"><li> <i class="fa-sharp fa-solid fa-gear"></i> &nbsp; &nbsp;Add Transaction</li></a>
        </ul>

        <ul style="position:relative; top:43.5vh;margin-left: 1vw;">
           <a href="#" class="logOutLink"> <li>Log out</li></a>
        </ul>
    </div> 
<div class="transition-fade  container-m" id="swup">
<!-- <div class="side-menu mobile">
        <ul style="margin-bottom: -2vh;margin-top:-3.6vh;">
            <li>
        <div class="brand-name" style="display:flex; justify-content:space-between; width:100vw;">
            
              
            <h1><a href="index.php">e-Track</a></h1>
            <h2 style="cursor:pointer;" class="sideTogglerCanceler">&#9776;</h2>
      
     
        </div>
    </li>
</ul>

        <ul>
            <a href="index.php"><li><i class="fa-solid fa-house"></i> &nbsp; &nbsp;Home</li></a>
            <a href="transaction.php"><li> <i class="fa-solid fa-chart-line"></i> &nbsp; &nbsp;Transactions</li></a>
            <a href="income.php"><li> <i class="fa-solid fa-user"></i> &nbsp; &nbsp;Income</li></a>
            <a href="expense.php"><li> <i class="fa-sharp fa-solid fa-gear"></i> &nbsp; &nbsp;Expenses</li></a>
        </ul>
        <ul style="margin-top:43vh;margin-left: 3.15vw;">
            <a href="#" class="logOutLink"> <li>Log out</li></a>
         </ul>
    </div> -->
    <!-- end of side-menu -->
  <!-- this page is the expense page, where the users can see all his expenses -->
<div class="content-1">
 <!-- the sideTogglerMobile is a menu icon and is only visible in mobile view and allows the user to toggle the side-menu on mobile -->
     <h2 class="sideTogglerMobile">&#9776;</h2>
<div class="row-heading">
<div class="row-1">
<div class="Tran"><h1 id="transactionsHeader">Transactions</h1></div>
</div>
<div class="filterFlex">
<div class="content-2">

 <!-- the subsequent input is where the user can search for transactions he has made -->
<form>
<input type="text" placeholder="Search"> 
</form>
</div>
<!-- The following button with a link is where the user clicks when he wants to add a new transaction(income or expense) an the link directs the user to the page for adding transactions -->
<a href="/Expend/addTransaction.php"><button class="add"><i class="fa-solid fa-plus"></i></button></a>

</div>
<div class="Trans-1">
<div class="totalFlex">
 <!-- below is where the user will find his total balance which is a calculation of all his transactions. The $0 is just a placeholder because the user has not added an income or expense yet when the user adds
 an income or expense, the total calculation should reflect there. Note that the class name is 'total' -->
<h3>Total:</h3>
<p class="total">$0</p>
</div>
<!-- below is where the user will find his transaction, the h4 of class 'productName' is where the user should find the name of the product he added in the addTransaction.php page and 
the p with class 'date'is where he should see the date he put in the addTransaction.php page and the p with class 'amount' is where he should see the amount he put in the addTransaction.php page. The totalFlex is simply a container
to store these data in a nice flex layout and you can check the styles for each classes in the style.css to better understand it. Of course the things here are just placeholders
because the user has not made any transaction yet and you should clear them and add the user's real transactions hed made in the addTransaction.php page  -->
<div class="totalFlex">
<div class="innerFlex">
<h4 class="productName">Cars</h4>
<p class="date">10/12/2022</p>
</div>
<p class="amount">$10,091</p>
</div>
<div class="totalFlex">
 <div class="innerFlex">
<h4 class="productName">Groceries</h4>
<p class="date">10/11/2022</p>
</div>
<p class="amount">$60</p>
</div>
</div>
</div>
</div>
</div>
</body>
</html>