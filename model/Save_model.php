<?php 
    require_once "db_connection.php";

    class Save_m 
    {
        function create($name,$img,$id,$pdf,$user_id)
        {
            
            $query = mysql_query( "INSERT INTO save_book (name,img,book_id,save_pdf,user_id) VALUES ('$name','$img','$id','$pdf','$user_id')");

        }
        function get_all($user_id)
        {
            // var_dump($user_id) ;
            $query = mysql_query("SELECT * FROM save_book WHERE user_id = '$user_id'  ");

            return $query;
        }
        function delete($id)
        {
            $query = mysql_query("DELETE save_book WHERE id = '$id'");
        }
    }
?>