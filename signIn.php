<?php 

//check if submit button is clicked

if(!empty($_POST['submit'])){
    // check if input fields are clicked
    if(empty($_POST['email']) || empty($_POST['password']) ){
        exit('Ensure all input fields are filled. <a href="./signIn.php">return</a>');
    }

    //security checks
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);

    //connect to database
    require_once('./database/connect.php');

    //search through the database
    $sql = " SELECT * FROM `member` WHERE `email`='{$email}' ";
    $result = $db->query($sql);

    //check for errors
    if($result===false){
        exit('SQL error. <a href="./signIn.php">return</a>');
    }

    //check the number of rows returned
    if($result->num_rows === 0){
        exit('No match found. <a href="./signIn.php">return</a>');
    }

    //check for password
    $password = md5($password);

    $array = $result -> fetch_array();
    $result->free();

    $db->close();

    if($password === $array['password'] ){
        //set cookies here

        setcookie('id', $array['user_id'], 0, '/');
        $security = md5($array['user_id'].$array['password'].'one_plus_one_is_three' );
        setcookie('security', $security, 0, '/');

        echo('<script>window.location.href="./addTransaction.php"</script>');
    }else{
        exit('wrong password . <a href="./signIn.php">return</a>');
    }



}

?>
















<html lang="en">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="preconnect" href="https://fonts.googleapis.com">
       
<script defer src="node_modules/swup/dist/swup.min.js"></script>
<script defer src="expend.js"></script>
    <link rel="stylesheet" href="expend.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,700;1,800&display=swap" rel="stylesheet">
    <title>e-Track</title>
</head>
<body>
    <header>
        <nav>
        <div><p class="title"><a href='index.php' class="titleLink">e-Track</a></p></div>
        
        <div class='naVlinkDiv'><a href="#" class="navLink">Home</a> <a class="navLink" href="#">About</a> <a  class="navLink" href="#">Contact</a><div class="menuBar">&#9776;</div></div>
        </nav>
        <div class="dropdown">
            <p><a href="index.php" class="n">Home</a></p>
             <p><a class="n" href="#">About</a> </p>
             <p><a  class="n" href="#">Contact</a></p>
        </div>
    </header>
   
    <main class="transition-fade" id='swup'>
    <div class="header">
       
        <div class="welcomeFlex">
            <h2 class="welcomeMessage">Welcome Back</h2>
            
        </div>
       <!-- <form action="./database/login.php" method='POST'> -->
       <form action="" method='POST'>
        <div class="formbody">
          
                <div class='labels'><label for="email" >Email</label></div>
         
            <div class="input">
                <input type="email" name="email" spellcheck = 'false' placeholder="example@email.com" id="email">
                <div class="error"></div>
            </div>
        
            <div class='labels'><label for="password">Password</label></div>
        
        <div class="input">
            <input type="password" spellcheck = 'false' name="password" id="password" placeholder="Password">
            <div class="error"></div>
        </div>
            <input name="submit" type="submit"class='loginBtn' value="Log in"/>
        </div>
       </form>
       <p><small>Don't have an account?    <a  href="signUp.php" >Create an account</a></small></p>
    </div>  
    </main>

    <footer>
        <p>Copyright © 2022. All rights reserved.</p>
    </footer>
    
</body>
</html> 
