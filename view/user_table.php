<?php
if (!isset($_SESSION))
    session_start();
if( $_SESSION["user_id"] != 1){
	
	header("Location: index.php ");
}
    require_once "header.php";
    require_once "navigation.php";
     require_once "../controller/Sign_controller.php";

     $sign = new Signup();
     $sql = $sign->get_all();

    
?>

    <div class="container ">
            <table id="mytable" class="table table-hover table-striped table-bordered ">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>User Name</td>
                        <td>Email</td>
                        <td>password</td>
                        <td>Join Date</td>
                    </tr> 
                </thead>
               
                
                <tbody>
                        
                 <?php while ($get_data = mysql_fetch_array($sql))
                 {?>
                    <tr>
                        <td><?=$get_data['id']?></td>
                        <td><?=$get_data['name']?></td>
                        <td><?=$get_data['email']?></td>
                        <td><?=$get_data['password']?></td>
                        <td><?=$get_data['date']?></td>

                    </tr>
                                     <?php } ?>

                </tbody>
            </table>        
    </div>

    <script>
    $('#mytable').dataTable();
    </script>

<?php
     require_once "footer.php";
?>