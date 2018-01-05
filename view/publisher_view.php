<?php

if (!isset($_SESSION))
    session_start();
if( $_SESSION["user_id"] != 1){
	
	header("Location: index.php ");
}
require_once"header.php";
require_once"navigation.php";
// require_once "../model/Publisher_model.php";
require_once "../controller/Publisher_controller.php";
 require_once "../model/db_connection.php";
    require_once("function.php");

$publisher = new Publisher_controller();
$sql =$publisher->get_all(); 

// }
 $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10; //if you want to dispaly 10 records per page then you have to change here
    	$startpoint = ($page * $limit) - $limit;
        $statement = "publishing_house order by id asc"; //you have to pass your query over here

		$res=mysql_query("select * from {$statement} LIMIT {$startpoint} , {$limit}");





?>


<div class="cus_create">
<div class="container">
    <div class="row">
        <form name="myForm" style="margin-top:40" class="form-horizontal " onsubmit="return validateForm()" role="form"  action="../controller/Publisher_controller.php" method="post" >

            <div class="form-group">
                <label class=" col-md-offset-2 col-md-1 cus_font">Publisher</label>
                <div class="col-md-5">
                    <input type="text" name="p_name" class="form-control cus_input"  placeholder="Enter Publisher Name">
                </div>
                <button type="submit" class=" btn btn-primary" style="height:45px;" name="insert">Add</button>
            </div>
            
        </form>
    </div>
</div>

</div>
<!--end of form-->

<div class="container col-md-offset-1 col-md-10">
    <div style="margin-top: 30px">
        <table id="mytable" class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Publisher Name</th>
                    <th>Operation</th>
                </tr>
               
              
                <tbody>
                     <?php while ($get_data=mysql_fetch_array($res)) {?>
                    <tr>
                        <td><?=$get_data['id']?></td>
                        <td><?=$get_data['name']?></td>

                        <td><button type="button" class="up" name="edit" value="Edit" id="<?php echo $get_data["id"];
                         ?>" data-toggle="modal" data-target="#project1">Update</button></td>
                    </tr>
                                    <?php }?>

                </tbody>


            </thead>
        </table>
    </div>
</div>
<!--end of table-->


  <div class="modal fade" id="project1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title"> Update Publisher</h4>
        <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      
      <div class="modal-body">
        <form class="form-horizontal" role="form" action="../controller/Publisher_controller.php" method="post" >
         <div class="form-group">
           <label class="col-md-offset-1 col-md-1">Publisher</label>

             <div class="col-md-offset-1 col-md-5">
                 <input type="text" id="p_name"  name="p_name" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ" >
                  <input type="hidden" name="p_id" id="p_id">
                 
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
echo "<div id='pagingg'>";
echo pagination($statement,$limit,$page);
echo "</div>";
?>
  <script>
function validateForm() {
    var x = document.forms["myForm"]["p_name"].value;
    if (x == "") {
        alert("Name is empty, Please Enter Publisher Name");
        return false;
    }
}
</script>

<script>
     $(document).on('click', '.up', function(){  
           var publisher_id = $(this).attr("id");  
           $.ajax({  
                url:"../controller/Publisher_controller.php",  
                method:"POST",  
                data:{publisher_id:publisher_id},  
                dataType:"json",  
                success:function(data){  
                     $('#p_name').val(data.name);  
                    $('#p_id').val(data.id);
                    //  $('#update').val("Update"); 
                    //  $('#project1').modal('show');  
                }  
           }); 

        
      });  
    </script>
    <script>
        $('#mytable').dataTable();
    </script>

<?php

require_once "footer.php"
?>


