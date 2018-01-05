<?php

    require_once "db_connection.php";

    //  if(isset($_POST['publisher_id']))
    // {
    //  $query = " SELECT * FROM publishing_house WHERE id = '".$_POST["publisher_id"]."'";
    //     $result = mysql_query($query);
    //     $row = mysql_fetch_array($result);
    //     echo json_encode($row);
    // }

    class Publisher_model
    {
        function get_all() 
        {   
            $result = mysql_query("SELECT * FROM publishing_house order by id DESC; ");
            return $result;
            
        }
        function create($name)
        {   
           // var_dump($name);
            mysql_query("INSERT INTO publishing_house (name) VALUES ('$name')");
        }

        function get($id)
        {
            $query = " SELECT * FROM publishing_house WHERE id = $id";
            $result = mysql_query($query);
            $row = mysql_fetch_array($result);
            echo json_encode($row);
            return $result;
        }
        function update($name,$id)
        {
            //var_dump($name,$id);
            
            mysql_query(" UPDATE publishing_house SET name = ('$name') WHERE id = ('$id')");
        }
        
       
        function check_name($name)
        {
            $query =  " SELECT count(*) FROM publishing_house WHERE name = '$name'";
            $sql = mysql_query($query);
            $result = mysql_fetch_array($sql);
            return $result;

        }
        function get_p($id)
        {
            $result = mysql_query(" SELECT * FROM publishing_house WHERE id = $id");
            return $result;
        }
        function get_pub_name($id)
        {
            $query = mysql_query("SELECT * FROM publishing_house WHERE id = $id");
            return $query;
        }
    }

?>