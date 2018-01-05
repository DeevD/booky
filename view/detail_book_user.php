<?php

    require_once "header.php";
    require_once "navigation.php";
    require_once "../controller/Book_controller.php";
    require_once "../controller/Author_controller.php";
    require_once "../controller/Genre_controller.php";
    require_once "../controller/Publisher_controller.php";
    require_once("function.php");


    $book = new Book();
    $author = new Author();
    $genre = new Genre();
    $publisher = new Publisher_controller();

    $author_data = $author->get_all();
    $genre_data = $genre->get_all();
    $publisher_data = $publisher->get_all();

    $bookid = $_GET['id'];
    $sql_data  = $book->get($bookid);


    while ($get_data = mysql_fetch_array($sql_data)){ 

    $sql_author = $author->get_author($get_data['author_id']);

    // $get_releted_book = new Book();
    // $get_releted_book_sql = $get_releted_book->get_same_book($get_data['author_id']);
    $genre_id = $get_data['genre_id'];

  


    $sql_genre = $genre->get_genre($get_data['genre_id']);

    $sql_publisher = $publisher->get_publisher($get_data['publisher_id']);

    while($get_author=mysql_fetch_array($sql_author)){

        while($get_genre = mysql_fetch_array($sql_genre)){

            while($get_p = mysql_fetch_array($sql_publisher)){
   


?>

    <div class="container" >
        <div class="row">
            <div class="col-md-6">
            <div class="panel panel-heading cus_font" style="margin-left:20"  >
                <p><?=$get_data['name']?></p>
            </div>
                <div class="panel-body">
                <img  class=" " width = "250" height="300" src="../images/<?=$get_data['image']?>" alt="">
                </div>
            </div>
            <!---->
            <div class="col-md-6 thumbnail" style="margin-top: 10">
                <div class="row">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3><?=$get_data['name']?></h3>
                        </div>
                    
                    <div class="col-md-6" style="margin-top: 20">
                        <p style="font-family: Georgia, 'Times New Roman', Times, serif">Book Name</p>
                         <p style="font-family: Georgia, 'Times New Roman', Times, serif">Code Number</p>
                         <p style="font-family: Georgia, 'Times New Roman', Times, serif">Price</p>
                         <p style="font-family: Georgia, 'Times New Roman', Times, serif">Edition</p>
                        <p style="font-family: Georgia, 'Times New Roman', Times, serif">Author</p>
                        <p style="font-family: Georgia, 'Times New Roman', Times, serif">Genre</p>
                        <p style="font-family: Georgia, 'Times New Roman', Times, serif">Publishing House</p>
                        <p style="font-family: Georgia, 'Times New Roman', Times, serif">Publishing Date</p>

                    </div>
                    <!---->
                     <div class="col-md-6" style="margin-top: 20">
                          <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" ><?=$get_data['name']?></p>
                         <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_data['code_number']?></p>
                         <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_data['price']?>  Kyats</p>
                         <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_data['edition']?> (Editions)</p>
                         <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_author['author_name']?></p>
                         <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_genre['genre_name']?></p>
                          <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_p['name']?></p>
                          <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_data['timestamp']?></p>
                    </div>
                      <?php } ?> 

             <?php } ?> 

            <?php } ?> 
                            <a class="btn btn-success col-md-offset-5 col-md-2" style="margin-top:30px" href="../pdfs/<?= $get_data['pdf']?> "download>Dwonload</a>
                            

              <?php 

       
               }?>
            
              <!--<a href="../pdfs/<?=$get_data['pdf']?>" download = "<?=$get_data['name']?>"><button style="margin-top: 30" type="button" class="upc" name="edit" value="Edit" id="<?php echo $bookid;
                         ?>" data-toggle="modal" data-target="#project1">Download</button></a>-->
   
                </div>
            </div>
            </div>
        </div>
    </div>
    <!---->

   <?php   $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 3; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "book_create where genre_id = '$genre_id' "; //you have to pass your query over here
		$res=mysql_query("select * from {$statement} LIMIT {$startpoint} , {$limit}");
    ?>
        <div class="container">
            <h3 class="text-center" style="color: tan">Related book </h3>
            <hr>
            <div class="row">
                
                 <?php while($get_book = mysql_fetch_array($res)){?>
                <div class="col-md-4" style="margin-bottom: 60">
                    <div class="thumbnail" style="width: 200;height: 250;margin-top: 40">
                        <div class="panel-heading" style="background:cadetblue">
                             <a href="detail_book_user.php?id=<?=$get_book['id']?>"><p style="color: white" class="text-center"><?=$get_book['name']?></p>

                        </div>
          <img src="../images/<?=$get_book[image]?>" alt="Lights" style="width:100%" height="100%"></a>
            </div>
                </div>
                <?php }?>
            </div>
        </div>
    


    
    <!--<div class="thumbnail" style="width: 200;height: 250;margin-top: 40">
                <a href="detail_book_user.php?id=<?=$get_book['id']?>"><p class="text-center"><?=$get_book['name']?></p>
          <img src="../images/<?=$get_book[image]?>" alt="Lights" style="width:100%" height="100%"></a>
            </div>-->


<?php

echo "<div id='pagingg' >";
echo pagination($statement,$limit,$page);
echo "</div>";
?>


<?php 

require_once "footer.php";

?>