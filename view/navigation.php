  <!--starting Navigation header Bar-->
  <?php
   if (!isset($_SESSION))
	     session_start();
  ?>

    <?php

    require_once "../model/Request_model.php";
     require_once "../controller/Request_book.php";
       $req = new Request_book();
     $sql = $req->get_all();
     $cont_re_table = mysql_num_rows($sql);

    $request = new Request_model();

    $request_sql = $request->get_all();
    // var_dump($request_sql);
    $cont_request = mysql_num_rows($request_sql);
    // var_dump($cont_request);

    ?>

    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    <img class="img-circle img-logo" src="image/logo.png" width="30" height="30">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="margin-left:20">Booky</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse custom_font" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
         <li><a href="index.php">Home</a></li>
        <li class="active"><a href="book_shelves.php">BookShelves</a></li>

        <?php if($_SESSION['user_id']>1)
        {?>
         <li><a href="save_book.php">Room</a></li>
        <?php }?>
        
         <?php  if($_SESSION["user_id"]==1)
         {?>
         <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Create <b class="caret"></b></a>
        
          <ul class="dropdown-menu">
            <li><a href="author_view.php">Author</a></li>
             <li class="divider"></li>
            <li><a href="genre_view.php">Genere</a></li>
             <li class="divider"></li>
            <li><a href="publisher_view.php">Publisher</a></li>
             <li class="divider"></li>
            <li><a href="book_create_view.php">Book</a></li>
             <li class="divider"></li>
          </ul>
         
        </li>

        <!---->
          <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Table <b class="caret"></b></a>
        
          <ul class="dropdown-menu">
             <li><a href="user_table.php">User Tabale</a></li>
              <li class="divider"></li>
             <li><a href = "book_table.php">BookTable</a></li>
              <li class="divider"></li>
             
             <li><a href = "request_book_table.php"><span class="badge"style="margin-right:10"><?php echo $cont_re_table?></span>Request Book Table</a></li>
          </ul>
     
        </li>
              <?php }?>
   
    
        <!--end of create-->
          <?php if(($_SESSION["user_id"])>1)
        {?>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Request <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="request_book.php">Request</a></li>
            <li class="divider"></li>
            <li><a href="request_bookShelves.php"><span style="margin-right:10" class="badge"><?php echo $cont_request?></span >Request BookShelves</a></li>
          </ul>
        </li>
         <?php }?>
        <!--end of request-->
      </ul>
      <?php if(isset($_SESSION["logined_in"])) {?>
         
          <ul class="nav navbar-nav navbar-right "> 
           <li color: "> <a style="color:  #66ffff" href="logout.php" type="submit">LogOut</a></li>
          <img class="img-circle navbar-right" src="../user_images/<?=$_SESSION["image"]?>" width="50" height="50">
            <p class=" navbar-right" style="color:white;margin:14"><?php echo  $_SESSION["username"];?><a style="color:white" href="edit_profile.php?id=<?=$_SESSION["user_id"]?>"><span style="color:while" class="glyphicon glyphicon-pencil navbar-right"></a></span><p>
          </ul>
             
        
          
       <?php  } else {?>
      <form class="navbar-form navbar-right" role="form" action="check.php" method="POST">
        <div class="form-group">
          <input name="uname" type="text" class="form-control" placeholder="Enter Your Name" autocomplete="off">
        </div>
        <div class="form-group">
          <input name="psw" type="password" class="form-control" placeholder="Enter Your Password" autocomplete="off">
        </div>
        <button type="submit" value="login" name="login" class="btn btn-default">LogIn</button>
        <a  class="btn btn-primary" href="SignUp.php" formaction="SignUp.php" class="btn btn-default">Sign Up</a>
      </form>
       <?php }?>

      
     
    
    </div>
  </div>
</nav>
<!--End of Navigation-->
