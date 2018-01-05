<?php
    require_once "../model/Book_model.php";
    require_once "File_upload.php";

     if (!isset($_SESSION))
	     session_start();

    $book = new Book();
    if(isset($_POST['create']))
    {
        $book->create();
    }
    if(isset($_POST['update']))
    {
        $book = new Book();
        $book->update();
      header("Location: ../view/detail_book.php");

    }
    if(isset($_POST['book_id']))
    {
        $id = $_POST['book_id'];
        $book->get_update($id);
        header("Location: ../view/detail_book.php");

    }
    if(isset($_POST['delete']))
    {
        $book->soft_delete();
    }
    // if(isset($_GET['keyword']))
    // { 
    //     $key = $_GET['keyword'];
    //      var_dump($key);
    //     $book->search($key);

    // }

    class Book 
    {
        function create()
        {   
            
            $name = $_POST['book_name'];
            $code = $_POST['code_number'];
            $price = $_POST['price'];
            $des = $_POST['description'];
            $edition = $_POST['edition'];
            $author_id = $_POST['Author'];
            $genre_id = $_POST['Genre'];
            $publisher_id = $_POST['Publisher'];

            if($name==null && $name == "")
            {
                $_SESSION["book_error"] = "Please Fill this form " ;
                header("Location: ../view/book_create_view.php");
            }
            else

            $file_upload = new File_upload();
            $image=$file_upload->image_upload("bookimg");
            $pdf = $file_upload->pdf_upload("pdf");
            
            $book_m = new Book_model();
            $book_m->create($name,$code,$price,$des,$edition,$image,$pdf,$author_id,$genre_id,$publisher_id);
            header("Location: ../view/book_table.php");

        }
        function get_all()
        {
            $book_model = new Book_model();
            return $book_model->select();
        }
        function get($book_id)
        {
        
            $book = new Book_model();
            // var_dump(mysql_fetch_array($book->get($book_id))) or die ();
            return $book->get($book_id);
            
        }

        function get_author($id)
        {
            $book = new Book_model();
            return $book->get_author_book($id);
        }
        function get_genre_book($id)
        {
            $book = new Book_model();
            return $book->get_genre_book($id);
        }
        function get_p_book($id)
        {
            $book = new Book_model();
            return $book->get_p_book($id);
        }

        function get_update($id)
        {
            $book = new Book_model();
            return $book->get_update($id);
        }
        function update()
        {

            
            $name = $_POST['book_name'];
            $id = $_POST['book_id'];
            $code = $_POST['code_number'];
            $price = $_POST['price'];
            $edition = $_POST['edition'];
            $author_id = $_POST['Author'];
            $genre_id  = $_POST['genre'];
            $publisher_id  = $_POST['publisher'];


            $file_upload = new File_upload();
            $image_update =$file_upload->image_upload("img_update");
            $pdf_update =$file_upload->pdf_upload("pdf_update");

            // var_dump ($image_update,$pdf_update);

            $book = new Book_model();
            $book->update($name,$id,$code,$price,$edition,$author_id,$genre_id,$publisher_id,$image_update,$pdf_update);
            header("Location: view/detail_book.php?id=<?=$id?>");

        }
        function soft_delete()

        {
            $id = $_POST['book_id'];
            $book = new Book_model();
            $book->soft_delete($id);
            header("Location: ../view/detail_book.php?id=<?=$id?>");


        }
        function get_book_new()
        {
            $book = new Book_model();
            return $book->get_book_new();
        }
        function get_same_book($id)
        {
            $book = new Book_model();
            return $book->get_same_book($id);
        }
        
        function search($key)
        {
            
            $book = new Book_model();
            return $res= $book->search($key);
        
        }
        
        
    }
?>