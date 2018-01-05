<?php
    $server = "localhost";
    $user = "root";
    $password = "root";
    $db = "bookstore";

    mysql_connect($server,$user,$password)
    or die("Sorry, can't connect to the mysql");
    mysql_select_db($db)
     or die("Sorry, Can't select the database ");
?>