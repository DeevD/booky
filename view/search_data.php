
 <?php
 require_once "header.php";
 require_once "navigation.php";
 require_once "search.php"; 
//  require_once "../model/db_connection.php";
 require_once "../controller/Book_controller.php";


 
 
    if(isset($_GET['keyword']))
    {
        $key = $_GET['keyword'];
        // var_dump($key);

        // $book = new Book_model();
        $book = new Book();
        $result = $book->search($key);

    


        // getting cont from database;
        $rowcount=mysql_num_rows($result);
        

        
    

        // var_dump($result);

    }
/*
    if(!empty($result))
    {
        while($get = mysql_fetch_array($result)){ ?>

            echo $get['name'];
            echo $get['id'];

       <?php }?>
           
       
    }*/

 ?> 

 <div class="container">
     <div class="row">
     <h3 style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Found <?php echo $rowcount?> Book<span style="margin-left:20" class="glyphicon glyphicon-search"></span></h3>
     <hr>
         <?php if(!empty($result)) 
         {  while($get=mysql_fetch_array($result)){  ?>
         <div class="col-md-4">
           <div class="panel panel-success" style="width: 100%;" >
               <div class="panel-heading " style="text-align: center" >
                   <a href="detail_book_user.php?id=<?=$get['id']?>"><p style="text-align: center"><?=$get['name']?></p>
               </div>
               <div class="panel-body">
                    <img width="100%" height="300" src="../images/<?=$get['image']?>" alt=""></a>
               </div>
           </div>  
           
          
         </div>
         <?php }  } else{?>
         <div>
             <p>Nothing Founded</p>
         </div>
         <?php }?>
     </div>
 </div>