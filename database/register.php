<?php

//check if the submit button was clicked

if(!empty($_POST['submit'])){

    //check if all input fields are clicked
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])  || empty($_POST['re_password'])  ){
        exit('Please fill all input fields. <a href="./signUp.php">return</a>');
    }

    //check if the two passwords are the same
    if($_POST['password'] !== $_POST['re_password'] ){
        exit('Please fill all input fields. <a href="./signUp.php">return</a>');
    }

    //validate user email address
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL ) ){
        exit('Please fill all input fields. <a href="./signUp.php">return</a>');
    }


    $password = $_POST['password'];
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character. <a href="./signUp.php">return</a> <br/>';
    }else{
        echo 'Strong password.<br/>';
    }



    //check if email already exit in database before
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    $name = addslashes($_POST['name']);

    //connect to database
    // require_once('./database/membership.php');
    require_once('./database/connect.php');

    //prepare SQL statements
    $sql = "SELECT * FROM `member` WHERE `email` = '{$email}'  ";
    $result = $db->query($sql);
    //check for sql error

    if($result === false){
        exit('Error. <a href="./signUp.php">return</a>');
    }

    // if($db->error){
    //     exit('Error. <a href="./Registration">return</a>');
    // }

    //check number of rows returned
    if($result->num_rows !== 0){
        exit('Email address already exist. <a href="./signUp.php">return</a>');
    }

    //destroy database object
    $result->free();

    //encrypt password

    $password = md5($password);

    //insert into database
    $sql = "INSERT INTO `member` SET `email` = '{$email}', `password`='{$password}', `user_name`='{$name}' ";
    $result = $db->query($sql);

    if($result===true){
        echo('registration complete.<br/>');
    }else{
        echo('registration failed.<br/>');
    }

    //disconnect from database

    $db->close();



}



?>