<?php
    require_once "header.php";
    require_once "navigation.php";
    require_once "../controller/Book_controller.php";
    require_once "../controller/Genre_controller.php";
    require_once "../controller/Author_controller.php";  
    require_once "../controller/Publisher_controller.php";

    $publisher_id = $_GET['id'];

    $publisher_name = new Publisher_controller();
    $sql_get_name = $publisher_name->get_pub_name($publisher_id);

    $book = new Book();
    $sql_get = $book->get_p_book($publisher_id);

     $genre = new Genre();
    $sql_genre = $genre->get_all();

    $Publisher = new Publisher_controller();
    $sql_publisher = $Publisher->get_all();

    $author = new Author();
    $sql_author = $author->get_all();
    while($get_name = mysql_fetch_array($sql_get_name)){

?>

   
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                          <table class="table table-hover table-border" id="mytable" >
            <thead>
                <tr>
                    <td>Image</td>
                    <td>BooKName</td>
                    <td>Publisher Name</td>
                    <td>Download</td>
                </tr>
            </thead>
            <tbody>
                  <?php  while ($get_p_book = mysql_fetch_array($sql_get)){ ?>
                <tr>
                    <td><img class="img-circle" src="../images/<?=$get_p_book['image']?>" width="50" height="50" alt=""></td>
                    <td><a href="detail_book_user.php?id=<?=$get_p_book['id']?>"><?=$get_p_book['name']?></td>
                    <td><?=$get_name['name']?></td>
                    <td>            <a class="btn btn-default " style="margin-top:30px" href="../pdfs/<?=$get_p_book['pdf']?>" download="<?=$get_p_book['name']?>">dwonload</a>
</td>
                </tr>
   <?php }?>
    <?php }?>
            </tbody>
        </table>
                </div>
                 </div>
                    
                    <div  class="col-md-3 ">
                               <h3 class="text-center" >Other Categories</h3>
            <div class="panel-group" id="accordion2">
                    <div class="panel panel-default">
                    <div class="panel-heading" style="background: dodgerblue">
                        <h4 class="panel-title">
                            <div class="text-center">
                            <a style="color: white" data-toggle="collapse" data-parent="#accordion2" href="#genre">Genre Categories<span style="margin:10;color: white" class="glyphicon glyphicon-search" ></span></a>

                            </div>
                        </h4>
                        </div>
                        <div id="genre" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul>
                                    <?php while($get = mysql_fetch_array($sql_genre)){ ?>
                                    <a href="genre_book.php?id=<?=$get['id']?>"><li><?=$get['genre_name']?></li></a>
                                    <?php }?>
                                </ul>

                                </div>
                            </div>
                            </div>
                            </div>
    
     <div class="panel-group" id="accordion3">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: turquoise">
        <h4 class="panel-title">
            <div class="text-center">
          <a style="color: white" data-toggle="collapse" data-parent="#accordion3" href="#author">Author Categories<span style="margin:10;color: white" class="glyphicon glyphicon-list" ></span></a>
                
            </div>
        </h4>
      </div>
      <div id="author" class="panel-collapse collapse">
        <div class="panel-body">
            <ul>
                <?php while($get = mysql_fetch_array($sql_author)){ ?>
                <a href="author_book.php?id=<?=$get['id']?>"><li><?=$get['author_name']?></li></a>
                <?php }?>
            </ul>

        </div>
      </div>
    </div>
    </div>  
    <!---->

      <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                    <div class="panel-heading" style="background: chocolate">
                        <h4 class="panel-title">
                            <div class="text-center">
                            <a style="color: white" data-toggle="collapse" data-parent="#accordion" href="#publisher">Publisher Categories<span style="margin:10;color: white" class="glyphicon glyphicon-search" ></span></a>

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
        <!--end accoridian-->
            <div class="col-md-4">
               
            </div>
    </div>


<script>
    $('#mytable').dataTable();
</script>
    





<?php 
    require_once "footer.php";
?>