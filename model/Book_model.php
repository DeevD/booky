<?php
    require_once "db_connection.php";

    class Book_model
    {
        function create($name,$code,$price, $des,$edition,$image,$pdf,$author_id,$genre_id,$publisher_id)
        {
           
          mysql_query(" INSERT INTO book_create (name,code_number,price,description,edition,image,pdf,author_id,genre_id,publisher_id) VALUES ('$name','$code','$price'
          ,'$des','$edition','$image','$pdf','$author_id','$genre_id','$publisher_id')");


        }
        
        function select()
        {
            $result = mysql_query (" SELECT * FROM book_create WHERE deleted = 0 ORDER BY id desc;");
            return $result;
        }
        function get($id)
        {
            $result = mysql_query (" SELECT * FROM book_create WHERE id = $id");
            return $result;
        }

        function get_author_book($id)
        {

            $result = mysql_query (" SELECT * FROM book_create WHERE author_id = $id");
            return $result;
        }
        function get_genre_book($id)
        {
            $query = mysql_query("SELECT * FROM book_create WHERE genre_id = $id");
            return $query;
        }
        function get_p_book($id)
        {
            $query = mysql_query("SELECT * FROM book_create WHERE publisher_id = $id");
            return $query;
        }
        function get_update($id)
        {
            $query = mysql_query("SELECT * FROM book_create WHERE id = $id");
            $row = mysql_fetch_array($query);
            echo json_encode($row);
            header("Location: ../view/detail_book.php");

        }

        function update($name,$id,$code,$price,$edition,$author_id,$genre_id,$publisher_id,$image,$pdf)
        {
           $query = mysql_query(" UPDATE book_create SET name = '$name' , code_number = '$code', price = '$price'
           , edition = '$edition', author_id = '$author_id',genre_id = '$genre_id',publisher_id = '$publisher_id',image ='$image',
           pdf = '$pdf' WHERE id = '$id'");
        }
        function soft_delete($id)
        {
            var_dump($id);
            $query = mysql_query ( " UPDATE book_create SET deleted = 1 WHERE id = '$id' ");
        }
        
        function get_book_new()
        {
            $sql = mysql_query("SELECT * FROM book_create WHERE id < 4");
            return $sql;
        }

        function get_same_book($id)
        {
            $query = mysql_query("SELECT * FROM book_create WHERE author_id = $id");
            return $query;
        }
        function search($key)
        {
            $query = mysql_query(" SELECT * FROM book_create WHERE name LIKE '%{$key}%' ");
            
            return $query;
        }
        
        
    
    
    }
?>