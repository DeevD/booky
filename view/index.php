<?php 

  require_once "header.php";
   require_once "navigation.php";
  require_once "../controller/Book_controller.php";


  if (!isset($_SESSION))
	 session_start();

  $book = new Book();
  $sql_query = $book->get_all();
   
    $new = new Book();
    $new_book = $new->get_book_new();

  ?>



<!--End of Navigation-->
<div class="container-fluid  responsive_bg">
   <div class="text-center center-block">
     <div style="color: white;" >
        <h1>Welcome To My Booky</h1> 
  <p>Upgrading your intelligent with reading books</p> 
  <img class="img-circle" src="image/bookshelves.jpg" width="100" height="100">
     </div>
 
</div>

</div>
<!--end of jumbotrom-->


<!-- corusal -->
<h2 class="text-center">Wishdom sayings</h2>
<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4>"I think of life as a good book. The further you get into it, the more it begins to make sense."<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
      </div>
      <div class="item">
        <h4>"Let us remember: One book, one pen, one child, and one teacher can change the world."<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
      </div>
      <div class="item">
        <h4>"You're never too old, too wacky, too wild, to pick up a book and read to a child. 
"<br><span style="font-style:normal;">Chandler Bing, Actor, FriendsAlot</span></h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!--<div class="container">
    <div class="row ">
      <div class="col-md-4 text-center img-thumbnail">
        <img class="img-responsive" src="image/simple.jpg" width="400" height="400" alt="">
        <p>Price-4000</p>
         <p>Name</p>

      </div>
       <div class="col-md-4 text-center img-thumbnail">
        <img class="img-responsive img-thumbnail" src="image/simple.jpg" width="400" height="400" alt="">
         <p>Price-4000</p>
         <p>Name</p>

      </div>
       <div class="col-md-4 text-center img-thumbnail">
        <img class="img-responsive img-thumbnail" src="image/simple.jpg" width="400" height="400" alt="">
         <p>Price-4000</p>
         <p>Name</p>

      </div>
      
    </div>
    
  </div>

  <div class="container">
    <div class="row ">
      <div class="col-md-4">
        <img class="img-responsive img-thumbnail" src="image/simple.jpg" width="400" height="400" alt="">
      </div>
       <div class="col-md-4">
        <img class="img-responsive img-thumbnail" src="image/simple.jpg" width="400" height="400" alt="">
      </div>
       <div class="col-md-4">
        <img class="img-responsive img-thumbnail" src="image/simple.jpg" width="400" height="400" alt="">
      </div>
      
    </div>
    
  </div>-->

  <div class="container-fluid">
    <div class="new_arrival text-center">
        <p><span><</span><span>New Arrival</span>
        <span>></span>
        </p>
      </div>    
  </div>
  <!--end of new Arrival-->


   <div class=" col-md-12 thumbnail" style="margin-top: 10;border-radius:20">
                            
    <div class="row" >
  
    <?php while($get=mysql_fetch_array($new_book)){?>

    <div class="col-md-4 text-center  "style="margin-top: 20">
    <a href="detail_book_user.php?id=<?=$get['id']?>"/> <p style="font-family: cursive;color: black;font-size: 20;" class="center-block text-center"><?php echo $get['id']?>. <?=$get['name'] ?></p>
    <img  src="../images/<?=$get['image']?>" width="200" height="300" alt="bookimage"></a>
    <div class="" style="margin: 10">
    <a href="../pdfs/<?=$get[pdf]?>" class="btn btn-primary"download>Download</a>
    <a href="detail_book_user.php?id=<?=$get['id']?>" style="background: #b366ff" class="btn btn-primary">Details</a>                                                           
    </div>                         
    </div>
        <?php }?>
    </div>
    </div>






 
  
<!-- ($get_data = mysql_fetch_array($sql_query)){?>
<div class="row">
  <div class=" col-md-4">
    <div class="thumbnail">
      <img src="../images/<?=$get_data['image']?>" width="400" height="200" data-src="holder.js/200x100" alt="...">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
    
  </div>
   <div class=" col-md-4">
    <div class="thumbnail">
      <img src="../images/<?=$get_data['image']?>" width="400" height="200" data-src="holder.js/200x100" alt="...">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
    
  </div>
   <div class=" col-md-4">
    <div class="thumbnail">
      <img src="../images/<?=$get_data['image']?>" width="400" height="200" data-src="holder.js/200x100" alt="...">
      <div class="caption">
        <h3>Thumbnail label</h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
    
  </div>
</div>-->

<?php
  require_once "footer.php"
  ?>