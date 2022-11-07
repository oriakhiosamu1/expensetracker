<?php

$db = @new mysqli("localhost", "root", "", "e-tp-project");
if($db->connect_error){
    exit("cannot connect to database");
}

var_dump($db->connect_error);



?>