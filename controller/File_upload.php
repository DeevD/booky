<?php

    class File_upload 
    {
        function image_upload($image)
        {
           // var_dump ("hekllo");
            if(isset($_FILES[$image]))
            {   
                $errors = array();
                $file_name = $_FILES[$image]['name'];
                $file_tmp = $_FILES[$image]['tmp_name'];
                $file_type = $_FILES[$image]['type'];
                // var_dump($file_name);

                $file_ext=strtolower(end(explode('.',$_FILES[$image]['name'])));
                $expensions = array("jpeg", "jpg","png");

                if(in_array($file_ext,$expensions)==false)
                {
                    $errors[] = " extension not allowed, Please choose a JPEG or PNG file. ";

                }
                if(empty($errors)==true)
                {
                    move_uploaded_file($file_tmp,"../images/".$file_name);
                    header("Location: ../view/book_create_view.php");

                    //var_dump($file_tmp);
                    //echo "success";
                }
                else 
                {
                    print_r ($errors);
                }
                return $file_name;



            }
        }



         function pdf_upload($pdf)
        {
           // var_dump ("hekllo");
           //var_dump($image);
            if(isset($_FILES[$pdf]))
            {   
                $errors = array();
                $file_name = $_FILES[$pdf]['name'];
                $file_tmp = $_FILES[$pdf]['tmp_name'];
                $file_type = $_FILES[$pdf]['type'];
                // var_dump($file_name);

                $file_ext=strtolower(end(explode('.',$_FILES[$pdf]['name'])));
                $expensions = array("pdf","epub");

                if(in_array($file_ext,$expensions)==false)
                {
                    $errors[] = " extension not allowed, Please choose a pdf file. ";

                }
                if(empty($errors)==true)
                {
                    move_uploaded_file($file_tmp,"../pdfs/".$file_name);

                   // var_dump($file_tmp);
                    //echo "success";
                }
                else 
                {
                    print_r ($errors);
                }
                return $file_name;



            }
        }

    
function user_image($image)
        {
           // var_dump ("hekllo");
            if(isset($_FILES[$image]))
            {   
                $errors = array();
                $file_name = $_FILES[$image]['name'];
                $file_tmp = $_FILES[$image]['tmp_name'];
                $file_type = $_FILES[$image]['type'];
                // var_dump($file_name);

                $file_ext=strtolower(end(explode('.',$_FILES[$image]['name'])));
                $expensions = array("jpeg", "jpg","png");

                if(in_array($file_ext,$expensions)==false)
                {
                    $errors[] = " extension not allowed, Please choose a JPEG or PNG file. ";

                }
                if(empty($errors)==true)
                {
                    move_uploaded_file($file_tmp,"../user_images/".$file_name);
                    header("Location: ../view/index.php");

                    //var_dump($file_tmp);
                    //echo "success";
                }
                else 
                {
                    print_r ($errors);
                }
                return $file_name;



            }
        }






    }

?>