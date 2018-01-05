<?php

    require_once "db_connection.php";

    class Genre_model 
    {
        function get_all()
        {   
            $result = mysql_query("SELECT * FROM genre order by id desc; ") or mysql_error();
            return $result;

        }

        function create($name)
        {
          mysql_query(" INSERT INTO genre (genre_name) VALUES ('$name') ") 
          or die(mysql_error()) ; 

        }

        function update($name,$id)
        {
          mysql_query(" UPDATE genre SET genre_name = '$name' WHERE id = ('$id')");
        }

        // function get($id)
        // {   
        //   $result_data=  mysql_query(" SELECT * FROM genre WHERE id = $id ");
        //   return $result_data;
        // }
         function get($id)
        
        {

        // $query = " SELECT * FROM genre WHERE id = '".$_POST["genre_id"]."'";
        $query = " SELECT * FROM genre WHERE id = $id";

        $result = mysql_query($query);
        $row = mysql_fetch_array($result);
        echo json_encode($row);

        }
        function check_name($name)
        {
            $query = " SELECT count(*) FROM genre WHERE genre_name = '".$name."'";
            $sql = mysql_query($query);
            $result = mysql_fetch_array($sql);
            return $result;
        }  
        function get_gen($id)
        {
            $query = mysql_query( " SELECT * FROM genre WHERE id = $id ");
            return $query;
        }
        function get_genre_name($id)
        {
            $query = mysql_query("SELECT * FROM genre WHERE id = $id ");
            return $query;
        }
       
    }

?>