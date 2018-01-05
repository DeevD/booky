<?php

if (!isset($_SESSION))
    session_start();
if( $_SESSION["user_id"] != 1){
	
	header("Location: index.php ");
}
    require_once "header.php";
    require_once "navigation.php";
    require_once "../controller/Author_controller.php";
    require_once "../model/db_connection.php";
    require_once("function.php");

    $author_controller = new Author();
    $sql = $author_controller->get_all();

    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "author order by id asc"; //you have to pass your query over here
		$res=mysql_query("select * from {$statement} LIMIT {$startpoint} , {$limit}");


?>

<div class="cus_create thumbnail ">
        <div class="container">
        <div class="row" >
        <form name="myForm" class="form-horizontal " onsubmit="return validateForm()" role="form" action="../controller/Author_controller.php" method="post" >
         <div class="form-group">
           <label class="col-md-offset-2 col-md-1 cus_font">Author</label>
             <div class=" col-md-5">
                 <input type="text" name="author_name" class="form-control required cus_input" placeholder="Enter Author" required >
            </div>
           
         </div>
          <div class="form-group">
            <label class="col-md-offset-2 col-md-1 cus_font" >Biography</label>
             <div class=" col-md-5">
                 <input type="text" name="bio" class="form-control required cus_input" placeholder="Enter Bio"  >
            </div>               
            </div>
                <button type="submit" class=" col-md-offset-5 col-md-1 btn btn-primary" style="margin-top: 10px" name="insert">Add</button>
          </form>
        </div>
    </div>
</div>
            <!--end of form-->

            <div class="container col-md-offset-1 col-md-10 " >
            <div style="margin-top: 30px">
                <table id= "mytable" class="table table-hover table-striped ">
               <thead>
                    <tr>
                        <th>ID</th>
                        <th>Author Name</th>
                        <th>Operation</th>
                    </tr>
            
               </thead>
               
               
               <tbody>
               <?php while($author_data=mysql_fetch_array($res)){ ?>
                   <tr>
                       <td><?=$author_data['id']?></td>
                       <td><?=$author_data['author_name']?></td>
                       <!-- putting author  ID to Model control wiht class -->
                       <td><button type="button" class="up" name="edit" value="Edit" id="<?php echo $author_data["id"];
                         ?>" data-toggle="modal" data-target="#project1">Update</button></td>
                   </tr>
                    <?php }?>
               </tbody>
              

           </table>
            </div>       
        </div>
        <!--end of table-->



  <div class="modal fade" id="project1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Update Author </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      
      <div class="modal-body">
     
        <form class="form-horizontal " role="form" action="../controller/Author_controller.php" method="post" >
         <div class="form-group">
           <label class="col-md-offset-2 col-md-1 ">Author</label>

             <div class=" col-md-5">
                 <input type="text" id="author_name"  name="author_name" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ" required>
                  <input type="hidden" name="author_id" id="author_id">
                 
            </div>
             <button type="submit" class=" btn btn-primary" id="update"  name="update">Update</button>

              
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
           var author_id = $(this).attr("id");  
           $.ajax({  
                 url:"../controller/Author_controller.php",  
                method:"POST",  
                data:{author_id:author_id},  
                dataType:"json",  
                success:function(data){  
                     $('#author_name').val(data.author_name);  
                      $('#author_id').val(data.id);
                }  
           });  
        
      });  
    </script>
<?php
echo "<div id='pagingg' >";
echo pagination($statement,$limit,$page);
echo "</div>";
?>

<script>
    $('#mytable').dataTable();
</script>


    <script>
function validateForm() {
    var x = document.forms["myForm"]["author_name"].value;
    if (x == "") {
        alert("Name is empty, Please Enter Genre Name");
        return false;
    }
}
</script>


<?php
require_once "footer.php"
?>


