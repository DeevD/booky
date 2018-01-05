<?php
if (!isset($_SESSION))
    session_start();
if( $_SESSION["user_id"] != 1){
	
	header("Location: index.php ");
}
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

    $sql_author = $author->get_author($get_data['genre_id']);
    $genre_id = $get_data['genre_id'];
    $get_releted_book = new Book();
    $get_releted_book_sql = $get_releted_book->get_same_book($get_data['genre_id']);

    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 6; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "book_create  where genre_id = '$genre_id' "; //you have to pass your query over here
		$res=mysql_query("select * from  {$statement} LIMIT {$startpoint} , {$limit}");

    

    $sql_author = $author->get_author($get_data['author_id']);
    $sql_genre = $genre->get_genre($get_data['genre_id']);
    $sql_publisher = $publisher->get_publisher($get_data['publisher_id']);

    while($get_author=mysql_fetch_array($sql_author)){

        while($get_genre = mysql_fetch_array($sql_genre)){

            while($get_p = mysql_fetch_array($sql_publisher)){
   


?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                   <img  class="thumbnail " width = "250" height="300" src="../images/<?=$get_data['image']?>" alt="">
                </div>

                <div class="col-md-6 thumbnail" style="margin-top: 30">
                      <div class="row">
                     <div class="col-md-6">
                         <p style="font-family: Georgia, 'Times New Roman', Times, serif">Book Name</p>
                         <p style="font-family: Georgia, 'Times New Roman', Times, serif">Code Number</p>
                         <p style="font-family: Georgia, 'Times New Roman', Times, serif">Price</p>
                         <p style="font-family: Georgia, 'Times New Roman', Times, serif">Edition</p>
                        <p style="font-family: Georgia, 'Times New Roman', Times, serif">Author</p>
                        <p style="font-family: Georgia, 'Times New Roman', Times, serif">Genre</p>
                        <p style="font-family: Georgia, 'Times New Roman', Times, serif">Publishing House</p>
                        <p style="font-family: Georgia, 'Times New Roman', Times, serif">Publishing Date</p>

                       
                     </div>
                      <div class="col-md-6">
                         <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif" >Name   <?=$get_data['name']?></p>
                         <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_data['code_number']?></p>
                         <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_data['price']?>  Kyats</p>
                         <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_data['edition']?> (Editions)</p>
                         <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_author['author_name']?></p>
                         <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_genre['genre_name']?></p>
                          <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_p['name']?></p>
                          <p style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><?=$get_data['timestamp']?></p>
                     </div>
                 </div>
                  <?php } ?> 

             <?php } ?> 

            <?php } ?> 
     <?php }?>
                <button type="button" class="up  col-md-offset-4 col-md-2 btn btn-success " name="edit" value="Edit" id="<?php echo $bookid;
                         ?>" data-toggle="modal" data-target="#project1">Update</button>

                </div>
                
            </div>
            
        </div>
        <!--above-->

        <div class="container">
            <h3 class="text-center" style="color: tan">Related book </h3>
            <hr>
            <div class="row">
                 <?php while($get_book = mysql_fetch_array($res)){?>
                <div class="col-md-4" style="margin-bottom: 60">
                    <div class="thumbnail" style="width: 200;height: 250;margin-top: 40">
                <a href="detail_book.php?id=<?=$get_book['id']?>"><p class="text-center"><?=$get_book['name']?></p>
          <img src="../images/<?=$get_book[image]?>" alt="Lights" style="width:100%" height="100%"></a>
            </div>
                </div>
                <?php }?>
            </div>
        </div>




    
   



  

    <div class="modal fade" id="project1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Update Book </h4>
        <button  type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      
      <div class="modal-body">
     
        <form class="form-horizontal " role="form" action="../controller/Book_controller.php" method="post"enctype="multipart/form-data" >
         <div class="form-group">
           <label class="col-md-offset-2 col-md-1 ">Book Name</label>

             <div class="col-md-offset-1 col-md-5">
                 <input type="text" id="book_name"  name="book_name" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ"required >
                  <input type="hidden" name="book_id" id="book_id">

            </div>    
         </div>
         <!--end of name-->
         <div class="form-group">
           <label class=" col-md-offset-2  col-md-1 ">Code Number</label>

             <div class="col-md-offset-1 col-md-5">
                 <input type="text" id="code_number"  name="code_number" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ"required >
               
            </div>    
         </div>
         <!--end of code number-->
           <div class="form-group">
           <label class="col-md-offset-2 col-md-1 ">Price</label>

             <div class="col-md-offset-1 col-md-5">
                 <input type="text" id="price"  name="price" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ"required >
                  
            </div>    
         </div>
         <!--end of price-->
           <div class="form-group">
           <label class="col-md-offset-2 col-md-1 ">Editon</label>

             <div class="col-md-offset-1 col-md-5">
                 <input type="text" id="edition"  name="edition" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ"required >
            </div>    
         </div>
         <!--end of editon-->

                        <div class="form-group">
                       <label class="col-md-offset-2 col-md-1">Author</label>
                       <div class="col-md-offset-1 col-md-6">
                        <select class="input-sm" id="Author" name="Author">
                        <?php while($get_file = mysql_fetch_array($author_data)) {?>
                           <option value="<?=$get_file['id']?>"><?=$get_file['author_name']?></option>
                        <?php }?>
                       </select>    
                        
                       </div>
                        </div>

            <!--end of author id-->

                        <div class="form-group">
                       <label class="col-md-offset-2 col-md-1">Genre</label>
                       <div class="col-md-offset-1 col-md-6">
                        <select class="input-sm" id="genre" name="genre">
                        <?php while($get_file = mysql_fetch_array($genre_data)) {?>
                           <option value="<?=$get_file['id']?>"><?=$get_file['genre_name']?></option>
                        <?php }?>
                       </select>    
                        
                       </div>
                        </div>
                        <!--end of genre-->

                        <div class="form-group">
                       <label class="col-md-offset-2 col-md-1">Publishing House</label>
                       <div class="col-md-offset-1 col-md-6">
                        <select class="input-sm" id="publisher" name="publisher">
                        <?php while($get_file = mysql_fetch_array($publisher_data)) {?>
                           <option value="<?=$get_file['id']?>"><?=$get_file['name']?></option>
                        <?php }?>
                       </select>    
                       </div>
                        </div>
                        <!--end of dropdown-->

                        <div class="form-group">
                          <label class="col-md-offset-2 col-md-1">Image</label>
                          <div  class="col-md-offset-1 col-md-5 thumbnail">
                          <input type="file" id="img_file" name="img_update"> <img  src="image/book_pic.png" alt="simpleimg"  class="img-rounded img-responsive">
                          </div>
                       </div>
                          <div class="form-group">
                          <label class="col-md-offset-2 col-md-1">pdf</label>
                          <div  class="col-md-offset-1 col-md-5">
                          <input type="file" id="pdf_file" name="pdf_update"> <img id="" src="image/logo.png" alt="simpleimg"  class="img-rounded img-responsive">
                          </div>
                       </div>




                       <div class="form-group" style="margin-top: 20">
                             <button type="submit" class=" btn btn-primary col-md-offset-3 col-md-2 " id="update"  name="update">Update</button>
                        <button type="submit" class="btn btn-danger col-md-offset-1"  name="delete" value="<?=$bookid?>" id="<?php echo $bookid;
                         ?>">Delete</button>

                       </div>
       
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<script>

     $(document).on('click', '.up', function(){  
           var book_id = $(this).attr("id");  
           $.ajax({  
                 url:"../controller/Book_controller.php",  
                method:"POST",  
                data:{book_id:book_id},  
                dataType:"json",  
                success:function(data){ 
                    //console.log(data.id);
                     $('#book_name').val(data.name);  
                      $('#book_id').val(data.id);
                      $('#code_number').val(data.code_number);
                       $('#price').val(data.price);
                       $('#edition').val(data.edition);
                       $('#Author').val(data.author_id);
                       $('#genre').val(data.genre_id);
                       $('#publisher').val(data.publisher_id);
                       $('#img_file').val(data.image);
                       $('#pdf_file').val(data.pdf);


                       
                       
                    //  $('#project1').modal('show'); 

                    //alert(data); 

                }  
           });  
        
      });  
    </script>

<?php

echo "<div id='pagingg' >";
echo pagination($statement,$limit,$page);
echo "</div>";
?>

<?php 

require_once "footer.php";

?>