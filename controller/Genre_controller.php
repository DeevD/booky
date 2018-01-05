<?php

    require_once "../model/Genre_model.php";
     $genre = new Genre();
    if(isset($_POST['insert']))
    {
       
        $genre->create();
    }

    if(isset($_POST['genre_id']))
    {
        $id = $_POST['genre_id'];
        $genre->get($id);
    }

    if (isset($_POST['update']))
    {
        $genre->update();
    }

    class Genre
    {   
        
        function get_all()
        {
            $genremodel = new Genre_model();
            return $genremodel->get_all();
        }

        function create()
        {
            $name = $_POST['genre_name'];
            $genre_model = new Genre_model();
            $checked = $genre_model->check_name($name);

            // ရွိခဲတယ္ဆိုု မထည့္ဘုုူး 
            if( $checked[0] > 0 || $name == null)
            {
                echo "fail insert ";
            }
             
             else
             {
                    $genre_model->create($name);
                  header("Location: ../view/genre_view.php");

             }




        }
        function get($id)
        {
            $genre_model = new Genre_model();
            return $genre_model->get($id);
        }

        function update()
        {   

            $name = $_POST['g_name'];
            $id = $_POST['g_id'];
            $genre_model = new Genre_model();
            $checked = $genre_model->check_name($name);

            if($checked[0]>0 || $name == null)
            {
                echo "fail update";
            }

            else 
           {

            $genre_model-> update($name,$id);
             header("Location: ../view/genre_view.php");
           }


            
        }

        function get_genre($id)
        {
            $genre = new Genre_model();
            return $genre->get_gen($id);
        }
        function get_genre_name($id)
        {
            $genre = new Genre_model();
            return $genre->get_genre_name($id);
            
        }
        
    }
?>