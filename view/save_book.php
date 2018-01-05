<?php 
    if(!isset($_SESSION))
    session_start();
    if($_SESSION['user_id']==1)
    {
        header("Location: index.php");
    }
 
    require_once "header.php";
    require_once "navigation.php";
    require_once "../controller/Save_controller.php";
    require_once "../controller/Book_controller.php";
    require_once "function.php";

   
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['username'];


 $book = new Book();

     $book_id = $_GET['id'];
     $sql_book = $book->get($book_id);
    //  getting book when like a book id and putting into save book

     while($save_book = mysql_fetch_array($sql_book)){
         $name = $save_book['name'];
         $img = $save_book['image'];
         $id = $save_book['id'];
         $pdf = $save_book['pdf'];
        //  var_dump($pdf);
        
         $save = new Save();
         $save->create($name,$img,$id,$pdf,$user_id);
     }

    //  getting save book for view
    // var_dump($user_id);
    $save = new Save();
    $sql = $save->get_all($user_id);
    $cout_book = mysql_num_rows($sql);


     $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 8; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "save_book where user_id = '$user_id' "; //you have to pass your query over here
		$res=mysql_query("select * from {$statement} LIMIT {$startpoint} , {$limit}");
    
    
?>  

<div>
    
    <div class="container-fluid save_bg" >

    </div>

    <div class="container">
        <div class="row">
        <h3 class="text-center" style="color: tan;margin-bottom: 30">welcome <?=$user_name?> </h3><span class="glyphicon glyphicon-book"> Your Saving Book <?php echo $cout_book?>  Book  </span>
        <hr>
 <?php while($get=mysql_fetch_array($res)){?>
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center"><?=$get['name']?></h3>
                        
                    </div>
                    
                    <div class="panel-img">
                        <a href="detail_book_user.php?id=<?=$get['book_id']?>">
                        <img src="../images/<?=$get[img]?>" width="100%" height="300" alt=""></a>
                        <button class="btn btn-danger" name="delete" style="margin-left: 10" type="submit" id="<?=$get['id']?>" >Delete</button>
                         <a href="../pdfs/<?=$get['save_pdf']?>" class="btn btn-success" type="submit" download>Download</a>
                        <a href="detail_book_user.php?id=<?=$get['book_id']?>" style="margin-left: 10" class="btn btn-primary" type="submit">Detail</a>   
                    </div>

                </div>
            </div>
  <?php }?>
        </div>
        <div style="margin-left:100">
      <?php
echo "<div id='pagingg' >";
echo pagination($statement,$limit,$page);
echo "</div>";
?>
        </div>

    </div>
 


<?php
    require_once "footer.php";
?>