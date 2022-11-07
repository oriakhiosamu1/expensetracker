<?php

//log out file

//check if both cookies are available

if(isset($_COOKIE['id']) && isset($_COOKIE['security']) ){
    //delete cookies using the negative time function
    setcookie('id', '', time()-1, '/');
    setcookie('security', '', time()-1, '/');
    echo('Bye.<a href="./signIn.php">return</a>');
}else{
    exit('Please log in first.<a href="./signIn.php">log in</a>');
}



?>