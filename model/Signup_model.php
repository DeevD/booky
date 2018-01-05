<?php

        require_once "db_connection.php";
        class Signup_model
        {
            function create($name,$email,$password,$confrim_password,$image)
            {   
                
                mysql_query(" INSERT INTO user (name,email,password,confirm_password,image) Values ('$name','$email',SHA('$password')
                ,'$confrim_password','$image') ");
            }
            
            function get_all()
            {
               $result =  mysql_query(" SELECT * FROM user order by id asc;");
               return $result;
            }
            function check($name,$psw)
            {
                $sql = mysql_query ( "SELECT * FROM user WHERE name = '$name' AND password = '$psw'  ");
                $result = mysql_fetch_array($sql);
                return $result;
            }
            function check_name($name)
            {
                $sql = mysql_query("SELECT * FROM user WHERE name = '$name' ");
                $result = mysql_fetch_array($sql);
                return $result;
            }
            function get_id($name,$password)
            {
                $sql = mysql_query(" SELECT * FROM user WHERE name = '$name' AND password = '$password' ");
                return $sql;
            }
            function get_user_profile($id)
            {
                $query = mysql_query( " SELECT * FROM user WHERE id = '$id' ");
                return $query;
            }
            function get_user($id)
            {
                
           $query = " SELECT * FROM user WHERE id = $id";
            $result = mysql_query($query);
            $row = mysql_fetch_array($result);
            echo json_encode($row);
            }

            function update($name,$id,$email,$pass,$phone,$gender,$address,$bio,$image)
            {
                $query = mysql_query("UPDATE user SET name = '$name' , image = '$image' , email = '$email' ,password = '$pass'
                 , phone = '$phone' , gender = '$gender', address = '$address', bio = '$bio' WHERE id = '$id' ");

            }
        }
?>