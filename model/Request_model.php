<?php

require_once"db_connection.php";


   class Request_model
   {
        function create($book,$author,$img,$user_name)
        {
             mysql_query("INSERT INTO `request_book`(`book_name`, `author_name` , `photo`,`user_name`) VALUES ('$book','$author','$img','$user_name')");
            
        }
        function get_all()
        {
            $result = mysql_query("SELECT * FROM request_book order by id desc;");
            return $result;
        }
        
   }
?>