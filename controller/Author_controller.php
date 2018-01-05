<?php

require_once "../model/Author_model.php";
 $author = new Author();
 
if(isset($_POST['insert']))
{
    $author->create();
   // header("Location: ../view/author_view.php");
}
if (isset($_POST['update'])) {
     $author->update();  
    //  header("Location: ../view/author_view.php");   
}
if (isset($_POST['author_id']))
{
    $id = $_POST['author_id'];
    $author->get($id);
}

class Author
{
    function get_all()
    {
        $author_model = new Author_model();
        $RESULT = $author_model->get_all();
        return $author_model->get_all();
    }
    function create()
    {
        $model = new Author_model();
        $name =  $_POST['author_name'];
        $bio = $_POST['bio'];
        
        $checked_name = $model->check_name($name);        
        if($checked_name[0]>0 || $name == null )
        {
            echo "fail insert";
        }
        else
        {
            $model = new Author_model();  
            $model->create($name,$bio);
            header("Location: ../view/author_view.php");
        }
    }
    function get($id)
    {
        $author_model = new Author_model();
        return $result = $author_model->get($id);
    }
    function update()
    {
        $name = $_POST['author_name'];
        $id = $_POST['author_id'];
        
        if($_POST['author_name']!=null)
        {
            
            $a_m = new Author_model();
            $check= $a_m->check_name($name);
            //var_dump(empty($check));die();
            if(!empty($check))
            {
               echo "Already Exit";
               header("Location: ../view/author_view.php"); 
            } 
            else
            {
               // var_dump($_POST['author_name']);die();
                $model = new Author_model();  
                $model->update($name,$id);
                 header("Location: ../view/author_view.php");
            }
        }
        header("Location: ../view/author_view.php");
        

    }
    function check()
    {
        $name = $_POST['author_name'];
        $author = new Author_model();
        $checked_name = $author->check_name($name);
        if ($checked_name == null)
        {
            $author = new Author_model();
            $author->create($name);
        }
    }

    function get_author($id)
    {
        $author = new Author_model();
       return $sql = $author->get_a($id);
       
    }
    function get_author_name($id)
    {
        $author = new Author_model();
        return $author->get_author_name($id);

    }
}

?>