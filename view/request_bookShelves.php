<?php
    require_once "header.php";
    require_once "navigation.php";
    require_once "../controller/Request_book.php";
        require_once("function.php");


    $request_c = new Request_book();
    $sql_get_all = $request_c->get_all();

    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 3; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "request_book order by id desc "; //you have to pass your query over here
		$res=mysql_query("select * from {$statement} LIMIT {$startpoint} , {$limit}");


    while($get_data = mysql_fetch_array($res)){

      
?>  
 

<div class=" container border">
    <div class="media media-left media-middle ">
  <a class="pull-left" href="#">
    <img class="media-object img-circle" src="../user_images/<?=$get_data['photo']?>" width="100" height="100" alt="simple">
  </a>
  <div class="media-body">
    <h4 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;color: cornflowerblue" >Book Name</h4>
    <p style="font-family: Georgia, 'Times New Roman', Times, serif" class="media-heading"><?=$get_data['book_name']?></p>
     <hr>
    <h4 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Author Name</h4>
    <p style="color:deepskyblue "><?=$get_data['author_name']?></p>
    <p  class="col-md-offset-9 col-md-5 glyphicon glyphicon-time">  <?=$get_data['timestamp']?></p>
    <h3  class="col-md-offset-9 col-md-5 ">Requested By</h3> <p class="col-md-offset-9 col-md-5 glyphicon glyphicon-user" style="font-size: 20;color: cornflowerblue">  <?=$get_data['user_name']?></p>


  </div>
</div>
</div>

<hr>

<?php }  ?>
<?php   if(empty($get_data)){?>
<div>
    <h2 class="text-center">Nothing Request Books</h2>
  </div>
<?php }?>




<?php
echo "<div id='pagingg' >";
echo pagination($statement,$limit,$page);
echo "</div>";
?>

<?php
require_once "footer.php"

?>


   