<?php

    require_once "header.php";
    require_once "navigation.php";
     require_once "search.php";
    require_once "../controller/Book_controller.php";
    require_once "../controller/Author_controller.php";
    require_once "../controller/Genre_controller.php";
    require_once "../model/db_connection.php";
    require_once "../controller/Publisher_controller.php";
    require_once("function.php");

    if(!isset($_SESSION))
    session_start();
    
    $book = new Book();
    $sql_get = $book->get_all();

    $find = $book->search();
    

  
   

    $author = new Author();
    $sql_author = $author->get_all();
    $cont_author = mysql_num_rows($sql_author);

    $genre = new Genre();
    $sql_genre = $genre->get_all();
     $cont_genre = mysql_num_rows($sql_genre);


    $Publisher = new Publisher_controller();
    $sql_publisher = $Publisher->get_all();
        $cont_publisher = mysql_num_rows($sql_publisher);



    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit =6; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "book_create "; //you have to pass your query over here
		$res=mysql_query("select * from {$statement} LIMIT {$startpoint} , {$limit}");
        $row_cont = mysql_num_rows($sql_get);
?>


    
                <div class="container" style="color: tan">
                    <div class="row ">
                        <h1 style="font-family: Verdana, Geneva, Tahoma, sans-serif" class="text-center">BookShelves</h1>
                        <hr>
                       <h3 style="color:black"> Total books <?php echo $row_cont ?> </h3>
                        <div class=" col-md-9 thumbnail" style="margin-top: 60">

                     
                <?php
                echo  "<div id='pagingg' >";
                echo pagination($statement,$limit,$page);
                echo "</div>";
                ?>  
                <hr>
                            <div class="row" >
                             <?php while($get=mysql_fetch_array($res)){?>
                                <div class="col-md-4 text-center  "style="margin-top: 20 ; margin-button:30">
                            <a href="detail_book_user.php?id=<?=$get['id']?>"> <p style="font-family:Arial, Helvetica, sans-serif;color: black;font-size: 20" class="center-block text-center"><?=$get['id']?>. <?=$get['name']?></p>
                    
                            <img  src="../images/<?=$get['image']?>" width="200" height="200" alt="bookimage"></a>
                            <div class="" style="margin: 10">
                            <a href="../pdfs/<?=$get['pdf']?>"class="btn btn-primary" download>Download</a>
                            <a href="detail_book_user.php?id=<?=$get['id']?>" style="background: " class="btn btn-info">Details</a> 
                           <?php  if($_SESSION['user_id']>1)
                            { ?>
                            <a href="save_book.php?id=<?=$get['id']?>" class="btn btn-success">Save</a> 

                           <?php }?>
                                                              
                            </div> 
                        </div>
                         <?php }?>


                                </div>
  <!--<?php
echo "<div id='pagingg' >";
echo pagination($statement,$limit,$page);
echo "</div>";
?>-->
                            </div>


    
    <div class="col-md-3">
          <div >
             <h2 class="text-center" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">Categories</h2>
            <hr>
     <div style="background:green" class="panel-group" id="accordion1">
    <div class="panel panel-default">
      <div class="panel-heading" style="background:limegreen">
        <h4 class="panel-title ">
            <div class="text-center">
            <span class="cus_badge badge"><?php echo $cont_author ?></span>   <a style="color: white" data-toggle="collapse" data-parent="#accordion1" href="#author">Author Categories<span style="margin:10" class="glyphicon glyphicon-list"></span></a>
            </div>
        </h4>
      </div>
      <div id="author" class="panel-collapse collapse">
        <div class="panel-body">
            <ul>
                <?php while($get = mysql_fetch_array($sql_author)){ ?>
                <a  class="cus_li" style="color: hotpink" href="author_book.php?id=<?=$get['id']?>"><li style="list-style: lower-roman"><?=$get['author_name']?></li></a>
                <?php }?>
            </ul>

        </div>
      </div>
    </div>
    </div>
    </div>
<!--end auhthor accordion-->

 <div  class="panel-group" id="accordion2" style="background:blue">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: hotpink;color: snow">
        <h4 class="panel-title">
            <div class="text-center" >
            <span class="cus_badge badge"><?php echo $cont_genre ?></span> <a style="color: snow" data-toggle="collapse" data-parent="#accordion2" href="#genre"><span style="margin:10" class="glyphicon glyphicon-search" style="color: snow"></span>Genre Categories</a>

            </div>
        </h4>
      </div>
      <div id="genre" class="panel-collapse collapse">
        <div class="panel-body">
            <ul>
                <?php while($get = mysql_fetch_array($sql_genre)){ ?>
                <a  class="cus_li" href="genre_book.php?id=<?=$get['id']?>"><li><?=$get['genre_name']?></li></a>
                <?php }?>
            </ul>

        </div>
      </div>
    </div>
    </div>
    <!--end of genre accordion-->
     <div style="background: palegreen" class="panel-group" id="accordion3">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: mediumpurple">
        <h4 class="panel-title" >
            <div class="text-center">
         <span class=" cus_badge badge"><?php echo $cont_publisher ?></span> <a style="color: snow" data-toggle="collapse" data-parent="#accordion3" href="#publisher"><span style="margin:10" class="glyphicon glyphicon-search"></span>Publisher Categories</a>
                
            </div>
        </h4>
      </div>
      <div id="publisher" class="panel-collapse collapse">
        <div class="panel-body">
            <ul>
                <?php while($get = mysql_fetch_array($sql_publisher)){ ?>
                <a href="publisher_book.php?id=<?=$get['id']?>"><li><?=$get['name']?></li></a>
                <?php }?>
            </ul>

        </div>
      </div>
    </div>
    </div>
    </div>

</div>
</div>  

 </div>



       

<?php
    require_once "footer.php";
?>