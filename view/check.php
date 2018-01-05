<?php
	require_once "../controller/Sign_controller.php";
	require_once "../model/Signup_model.php";

//session_save_path($_SERVER['DOCUMENT_ROOT']."/sessiontest/");
 session_start();

 	if($_POST['login'] == "login"){

		// if($sql[0]>0 &&  $_POST['uname']!="" )
        //  {
		 	// Set session variables
			 $name = $_POST['uname'];
			 $psw = SHA1($_POST['psw']);
			 
			//  $sha_psw = SHA($psw);
			 
			$model = new Signup_model();
			$sql = $model->check($name,$psw);
			// var_dump($sql) ;

			if(!empty($sql) && $name!=null && $psw!=null)
			{
				$_SESSION['user_id'] = $sql['id'];
				$_SESSION["username"] = $sql['name'];
				$_SESSION["image"] = $sql['image'];
				$_SESSION["password" ] = $sql['password'];
				$_SESSION["logined_in"] = true;
				// var_dump ($_SESSION) or die();
 				// echo "welcome ". $_SESSION["username"];
				header("Location: index.php");
			}
			 else
			{
				$_SESSION["error"] = "Wrong user name or password ";
				header("Location: index.php ");
			}
		//}	
	 }	
		else
		{
			$_SESSION['error'] = "No Direct script Allow!.";
			header("Location: index.php ");
		}

	

?>
