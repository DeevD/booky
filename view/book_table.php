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



    $book = new Book();
    $sql_data = $book->get_all();
    
    $author = new Author();
    $sql_author = $author->get_all();

    $genre = new Genre();
    $sql_genre = $genre->get_all();

    $Publisher = new Publisher_controller();
    $sql_publisher = $Publisher->get_all();

    
?>

    <div class="container">
        <div class="row">
            <div class="col-md-8" >
                <table id="mytable" class="table table-border table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Code Number</th>
                            <th>Price</th>
                            <th>Edition</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php while($get_data = mysql_fetch_array($sql_data)){?>
                        <tr>
                             <td><img class="img-circle" width="50" height="50" src="../images/<?=$get_data['image']?>"</td>                       
                            <td><?=$get_data['id']?></td>
                            <td><?=$get_data['name']?></td>
                            <td><a href="detail_book.php?id=<?=$get_data['id']?>"><?=$get_data['code_number']?></a></td>
                            <td><?=$get_data['price']?></td>
                            <td><?=$get_data['edition']?></td>                   
                            <td><?=$get_data['description']?></td>
                        </tr>
                         <?php }?>
                    </tbody>
                </table>
            </div>
            <!--end table-->

            <h4  class="text-center"  style="margin-top: 20px;font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;color: tan">Categories</h4>
            <hr>
     <div class="panel-group" id="accordion1">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: limegreen">
        <h4 class="panel-title">
            <div class="text-center">
               <a style="color: white" data-toggle="collapse" data-parent="#accordion1" href="#author">Author Categories</a>
            </div>
        </h4>
      </div>
      <div id="author" class="panel-collapse collapse">
        <div class="panel-body">
            <ul>
                <?php while($get = mysql_fetch_array($sql_author)){ ?>
                <a style="color: hotpink" href="author_book.php?id=<?=$get['id']?>"><li name="<?=$get['author_name']?>" style="list-style: lower-roman"><?=$get['author_name']?></li></a>
                <?php }?>
            </ul>

        </div>
      </div>
    </div>
    </div>
<!--end auhthor accordion-->

 <div class="panel-group" id="accordion2">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: hotpink">
        <h4 class="panel-title">
            <div class="text-center">
             <a style="color: white" data-toggle="collapse" data-parent="#accordion2" href="#genre">Genre Categories</a>

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
    <!--end of genre accordion-->
     <div class="panel-group" id="accordion3">
    <div class="panel panel-default">
      <div class="panel-heading" style="background: mediumpurple">
        <h4 class="panel-title">
            <div class="text-center">
          <a style="color: white" data-toggle="collapse" data-parent="#accordion3" href="#publisher">Publisher Categories</a>
                
            </div>
        </h4>
      </div>
      <div id="publisher" class="panel-collapse collapse">
        <div class="panel-body">
            <ul>
                <?php while($get = mysql_fetch_array($sql_publisher)){ ?>
                <a  href="publisher_book.php?id=<?=$get['id']?>"><li><?=$get['name']?></li></a>
                <?php }?>
            </ul>

        </div>
      </div>
    </div>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            var panel = $('.collapse > p').hide();
            panel.first().show();
        })
    </script>

    <script>
        $('#mytable').dataTable();
    </script>

    <?php
    require_once "footer.php";
    ?>