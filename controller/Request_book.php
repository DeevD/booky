<?php

    require_once "../model/Request_model.php";
     if (!isset($_SESSION))
	     session_start();

    if(isset($_POST['insert']))
    {
        $request = new Request_book();
        $request->create();
    }

    class Request_book
    {
        function create()
        {
            $book = $_POST['book_name'];
            $author = $_POST['author_name'];
            
            if($book == null && $book=="")
            {
                echo "Please insert book name";
            }
            else
            {
            $img = $_SESSION["image"];
            $user_name = $_SESSION["username"];
            $request_m = new Request_model();
            $request_m->create($book,$author,$img,$user_name);
            header("Location: ../view/request_bookShelves.php");

            }

        }
        function get_all()
        {
            $request_m = new Request_model();
            return $request_m->get_all();
        }
    }
?>