<?php
    require_once "db_connection.php";

    class Author_model
    {
        function get_all()
        {
            $result = mysql_query ("SELECT * FROM author order by id desc;");
            return $result;
        }
        function create($name,$bio)
        {
            mysql_query(" INSERT INTO author (author_name,bio) VALUES ('$name','$bio') ");
        }
        function get($id)
        {
            $query = " SELECT * FROM author WHERE id = $id";
            $result = mysql_query($query);
            $row = mysql_fetch_array($result);
            echo json_encode($row);
           

        }
        function update($name,$id)
        {
            mysql_query(" UPDATE author SET author_name = ('$name') WHERE id = ('$id')");
        }
        function check_name($name)
        {
            $query = mysql_query ("SELECT * FROM author WHERE author_name = '".$name."'  ");
            $checked_name = mysql_fetch_array($query);
            return $checked_name;
        }
        function get_a($id)
        {
            $query =  mysql_query("SELECT * FROM author WHERE id = $id ");                  
            return $query;
        }
        
        function get_author_name($id)
        {
            $query = mysql_query(" SELECT * FROM author WHERE id = $id");
            return $query;
        }
      
             
        }
        
     



?>