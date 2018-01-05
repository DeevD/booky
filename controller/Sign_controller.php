<?php

require_once "../model/Signup_model.php";
require_once "File_upload.php";


     if (!isset($_SESSION))
	     session_start();

if(isset($_POST['insert']))
{
    $sign = new Signup();
    $sign->Create();
}
if (isset($_POST['user_id']))
{
    $id = $_POST['user_id'];
    $sign = new Signup();
    $sign->get_user($id);
}
if(isset($_POST['update']))

{
    $sign = new Signup();
    $sign->update();
}



class Signup
{
    function Create()
    {
        // $sign_m = new Signup_model();
       
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confrim = $_POST['confirm_password'];

        $file = new File_upload();
        $image = $file->user_image("user_photo");
        $sign_m = new Signup_model();

        $sql = $sign_m->check_name($name);
        if(empty($sql))
        {
            $sign_m->create($name,$email,$password,$confrim,$image);
        }
        else
        {
            header("Location: ../view/SignUp.php");
            echo "name is already exist";
            
        }
      

    }

    function get_all()
    {
        $user_m = new Signup_model();
        return  $user_m->get_all();
        
        
    }
     function check_name($name)
   {
        $sign = new Sign_model();
        return $sign->check_name($name);    
   }
   function get_id($name,$password)
   {
       $sign = new Sign_model();
       return $sign->get_id($name,$password);
   }

   function get_user_profile($id)
   {
       
       $sign = new Signup_model();
       return $sign->get_user_profile($id);
   }

   function get_user($id)

   {
    $sign = new Signup_model();
    return $result = $sign->get_user($id);
    
   }
   function update()
   {
       $id = $_SESSION['user_id'] ;
       $file = new File_upload();
       $image = $file->user_image("user_pic");
       $name = $_POST['user_name'];
       $email=$_POST['email'];
       $pass = SHA1($_POST['password']);
       $phone = $_POST['phone'];
       $gender = $_POST['gender'];
       $address =$_POST['address'];
       $bio = $_POST['bio'];
       $sign = new Signup_model();
       $sign->update($name,$id,$email,$pass,$phone,$gender,$address,$bio,$image);
       header("Location: ../view/index.php");

   }
}

?>