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
    

    $book_con = new Book();
    $sql_get = $book_con->get_all();

    $author_name = new Author();
    $sql_author = $author_name->get_all();

    $gener_name = new Genre();
    $sql_genre = $gener_name->get_all();

    $publisher_name = new Publisher_controller();
    $sql_publisher = $publisher_name->get_all();

?>
        <!--new create -->
        <h1><?php echo $_SESSION["book_error"]?></h1>
        <div class="container thumbnail"  style="padding: 30px ">
            <div class="row">
                <form class="col-md-offset-1 form-horizontal" role="form" action="../controller/Book_controller.php" method="post" enctype="multipart/form-data" >
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-offset-1 col-md-1">Book Name</label>
                    <div class="col-md-offset-1 col-md-6">
                        <input type="text" name="book_name" class="form-control" placeholder="Enter Book Name">
                        </div>
                    </div>
                    <!-- end of book name-->

                <div class="form-group" style="margin-top: 30px"> 
                    <label class="col-md-offset-1 col-md-1">Code Number</label>
                    <div class="col-md-offset-1 col-md-6">
                        <input type="text" name="code_number" class="form-control" placeholder="Enter code_number">
                    </div>
                </div>
                <!--end of code number-->

                <div class="form-group" style="margin-top: 30px"> 
                    <label class="col-md-offset-1 col-md-1">Price</label>
                    <div class="col-md-offset-1 col-md-6">
                        <input type="text" name="price" class="form-control" placeholder="Enter Price">
                    </div>
                </div>

                <!--end of price-->
                 <div class="form-group" style="margin-top: 30px"> 
                    <label class="col-md-offset-1 col-md-1">Edition</label>
                    <div class="col-md-offset-1 col-md-6">
                        <input type="text" name="edition" class="form-control" placeholder="Enter Edition">
                    </div>
                </div>
                <!--end of edition-->

                <div class="form-group" style="margin-top: 30px">
                    <label class=" col-md-offset-1 col-md-1">Descriptions</label>
                    <div class=" col-md-offset-1 col-md-1">
                          <textarea  rows="3" cols="39" placeholder="Descriptions" name="description">Descriptions</textarea>
                    </div>
                </div>
                <!--end of description-->
                </div>
                <!---->
                <!--left side-->
                <div class="col-md-6">

                   <div class="form-group">
                       <label class="col-md-offset-1 col-md-1">Author</label>
                       <div class="col-md-offset-1 col-md-6">
                        <select class="input-sm" name="Author">
                        <?php while($get_file = mysql_fetch_array($sql_author)) {?>
                           <option value="<?=$get_file['id']?>"><?=$get_file['author_name']?></option>
                        <?php }?>
                       </select>    
                        
                       </div>
                   </div>
                   <!--end of author select-->

                    <div class="form-group" style="margin-top: 30px">
                       <label class="col-md-offset-1 col-md-1">Genre</label>
                       <div class="col-md-offset-1 col-md-6">
                        <select class="input-sm" name="Genre">
                        <?php while($get_file = mysql_fetch_array($sql_genre)) {?>
                           <option value="<?=$get_file['id']?>"><?=$get_file['genre_name']?></option>
                        <?php }?>
                       </select>    
                       </div>
                   </div>
                   <!--end of genre -->


                    <div class="form-group" style="margin-top: 30px">
                       <label class="col-md-offset-1 col-md-1">Publisher</label>
                       <div class="col-md-offset-1 col-md-6">
                        <select class="input-sm" name="Publisher">
                        <?php while($get_file = mysql_fetch_array($sql_publisher)) {?>
                           <option value="<?=$get_file['id']?>"><?=$get_file['name']?></option>
                        <?php }?>
                       </select>    
                       </div>
                   </div>
                   <!--end of publisher-->

                   <div class="form-group " style="margin-top: 30px">
                       <label class="col-md-offset-1 col-md-1">Image Insert</label>
                       <div class="col-md-offset-1 col-md-4 thumbnail">
                          <input type="file" id="file" name="bookimg"> <img src="image/book_pic.png" alt="simpleimg"  class="img-rounded img-responsive">
                       </div>
                   </div>
                   <!--end of image-->

                   <div class="form-group" style="margin-top: 30px">
                       <label class="col-md-offset-1 col-md-1">PDF Insert</label>
                       <div class="col-md-offset-1 col-md-6">
                           <input type="file" name="pdf" id="file">
                       </div>
                   </div>
                   <!--end of pdf-->
                </div>
                <!--right side-->

                 <div class="form-group" style="margin-top: 30px">
                    <div class="col-md-offset-3 col-md-5" >

                       <button style="background:peachpuff;limegreen;color: white;height:50px;margin-top:40;" type="submit" name="create" class="btn btn-default btn-lg btn-block">Create</button>

                    </div>
                </div>
                
                </form>
               
            </div>
            
        </div>


<?php
    require_once "footer.php";
?>

