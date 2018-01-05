<?php
if (!isset($_SESSION))
    session_start();
if( $_SESSION["user_id"] != 1){
	
	header("Location: index.php ");
}
    require_once "header.php";
    require_once "navigation.php";
    require_once "../controller/Genre_controller.php";
    require_once "../model/db_connection.php";
    require_once("function.php");


    $genre = new Genre();
    $sql = $genre->get_all();


    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "genre order by id asc"; //you have to pass your query over here
		$res=mysql_query("select * from {$statement} LIMIT {$startpoint} , {$limit}");


    if (!isset($_SESSION))
	 session_start();

if( $_SESSION["logined_in"] != 1){
	$_SESSION['error'] = "Please  Login .";
	header("Location: index.php ");
}






   

?>  
<!--
    <div class="row">
  <div class=" col-md-offset-4 col-lg-3" style="margin-top: 20px" >
    <div class="input-group">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
      <input type="text" class="form-control" placeholder="Search genre Name">-->
    <!--</div
  </div>-->



    <div class="cus_create">
        <div class="container">
        <div class="row">
        <form name="myForm" style="margin-top: 40" class="form-horizontal "  role="form" action="../controller/Genre_controller.php" onsubmit="return validateForm()" method="post" >
         <div class="form-group">
           <label class="col-md-offset-2 col-md-1 cus_font">Genre</label>
             <div class=" col-md-5">
                 <input type="text" name="genre_name" class="form-control cus_input" placeholder="Enter Genre" required>
            </div>
             <button type="submit" class=" btn btn-primary" style="height: 45px;" name="insert">Add</button>
         </div>
          </form>
        </div>
    </div>
    </div>
            <!--end of form-->
        
        <div class="container col-md-offset-1 col-md-10 " >
            <div style="margin-top: 30px">
                <table id="mytable" class="table table-bordered table-hover table-striped ">
               <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gener Name</th>
                        <th>Operation</th>
                    </tr>
            
               </thead>
               
              
               <tbody>
                    <?php while($genre_data=mysql_fetch_array($res)){ ?>
                   <tr>
                       <td><?=$genre_data['id']?></td>
                       <td><?=$genre_data['genre_name']?></td>
                       <!--<td><a href="genre_update.php?id=<?=$genre_data['id']?>">Update</a></td>-->
                       <td><button type="button" class="up" name="edit" value="Edit" id="<?php echo $genre_data["id"];
                         ?>" data-toggle="modal" data-target="#project1">Update</button></td>
                   </tr>
                     <?php  }?>
               </tbody>
             

           </table>
            </div>
                   
        </div>

    </div>

<!---->

 <div class="modal fade" id="project1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Update Genre </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      
      <div class="modal-body">
     
        <form class="form-horizontal " role="form" action="../controller/Genre_controller.php" method="post" >
         <div class="form-group">
           <label class="col-md-offset-2 col-md-1 ">Genre Update</label>

             <div class=" col-md-5">
                 <input type="text" id="g_name"  name="g_name" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ"required >
                  <input type="hidden" name="g_id" id="g_id">
                 
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

    <?php
echo "<div id='pagingg' >";
echo pagination($statement,$limit,$page);
echo "</div>";
?>
<script>
     $(document).on('click', '.up', function(){  
           var genre_id = $(this).attr("id");  
           $.ajax({  
                 url:"../controller/Genre_controller.php",  
                method:"POST",  
                data:{genre_id:genre_id},  
                dataType:"json",  
                success:function(data){ 
                    //console.log(data.id);
                     $('#g_name').val(data.genre_name);  
                      $('#g_id').val(data.id);
                    //  $('#project1').modal('show'); 

                    //alert(data); 

                }  
           });  
        
      });  
    </script>
     

<script type="text/javascript">
		$('#mytable').dataTable();
	</script>

    <script>
function validateForm() {
    var x = document.forms["myForm"]["genre_name"].value;
    if (x == "") {
        alert("Name is empty, Please Enter Genre Name");
        return false;
    }
}
</script>


  
    

 
<?php
    require_once "footer.php"
?>
 


