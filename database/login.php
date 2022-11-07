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

        echo('<script>window.location.href="./index.php"</script>');
    }else{
        exit('wrong password . <a href="./signIn.php">return</a>');
    }



}

?>


<!-- <form action="" method="post">
    Email/user name: <input type="text" name="email" id="" value="" ><br><br>
    password: <input type="password" name="password" id="" value="" ><br><br>
    <input type="submit" value="submit" name="submit">
</form> -->