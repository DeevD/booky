<?php
    require_once "../model/Save_model.php";
     if (!isset($_SESSION))
	     session_start();


    class Save 
    {
        
        function create($name,$img,$id,$pdf,$user_id)
        {
            // var_dump($name,$img,$pdf) or die();
            $save = new Save_m();
             $save->create($name,$img,$id,$pdf,$user_id);
        }
        function get_all($user_id)
        {  

            // $user_id = $_SESSION['user_id'];
            $save = new Save_m(); 
            return $save->get_all($user_id);
        }
    }
?>