<?php
    require_once "../model/Publisher_model.php";

    

   if(isset($_POST['insert']))
   {
       $p_c = new Publisher_controller();
       $p_c->create();
      //header("Location: ../view/publisher_view.php");


   }



   if(isset($_POST['publisher_id']))
   {
       $id = $_POST['publisher_id'];
        $p_c = new Publisher_controller();
       $p_c->get($id);
   }

   if(isset($_POST['update']))
   {
        $p_c = new Publisher_controller();
       $p_c->update($id);
     header("Location: ../view/publisher_view.php");

   }



    class Publisher_controller
    {
        function get_all()
        {
            $get_model = new Publisher_model();
            $get_data=$get_model->get_all();
            return $get_data;
            // var_dump($get_data) or die();

        }

        function create()
        {
            $p_model = new Publisher_model();
            $name = $_POST['p_name'];

            $checked_name = $p_model->check_name($name);
           // var_dump(mysql_fetch_array($checked_name));
            if($checked_name[0]>0 || $name == null)
            {
                 echo "error";

            }
            else
            {
             $p_model->create($name);
              header("Location: ../view/publisher_view.php");

            }
            
            
            

            
        }

        function get($id)
        {
            $publisher_model = new Publisher_model();
            return $publisher_model->get($id);
        }

        function update($id)
        {
         $name = $_POST['p_name'];
        $id = $_POST['p_id'];
        // var_dump($name,$id);
        $a_m = new Publisher_model();
          $checked_name = $a_m->check_name($name);
          if ($checked_name [0]>0 || $name == null)
          {
              echo "fail update";
          }
          else
          {
              $a_m->update($name,$id);
             header("Location: ../view/publisher_view.php");

          }
        
        }
        function get_publisher($id)
        {
            $publisher = new Publisher_model();
            return $publisher->get_p($id);
        }
        function get_pub_name($id)
        {
            $p = new Publisher_model();
            return $p->get_pub_name($id);
        }
    }
?>