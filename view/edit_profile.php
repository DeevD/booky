<?php
require_once "header.php";
require_once "navigation.php";
require_once "../controller/Save_controller.php";
require_once "../controller/Sign_controller.php";
require_once "../controller/Book_controller.php";

if (!isset($_SESSION))
    session_start();
    $book = new Book();





$user_id = $_SESSION["user_id"];
$sign = new Signup();
$sql_user = $sign->get_user_profile($user_id);

?>

<?php while($get=mysql_fetch_array($sql_user)){?>
<form class="form-horizontal">
    
<div class="container-fluid" style="background-image: url(image/coffeebook.jpeg);height: 50%">
    <div class="text-center ">
                 <img src="../user_images/<?=$get['image']?>" width="150" height="200" class="img-thumbnail " style="margin-top: 20%" alt="">
                 
        
    </div>
</div>


    <div class="text card container thumbnail " style="margin-top: 80">
         
    
        <div class="form-group ">
            <label class="col-md-offset-3 col-md-1" style="margin-top: 10">UserName</label> <span class="glyphicon glyphicon-user form-control-feedback"style="margin-top: 8"></span>
            <div class="col-md-offset-2 col-md-3">
                <input class="form-control" type="text" name="name" value="<?=$get['name']?>">
            </div>
        </div>
        <!--end of name-->
        <div class="form-group">
            <label class="col-md-offset-3 col-md-1" style="margin-top: 10">email</label><span class="glyphicon glyphicon-envelope form-control-feedback"style="margin-top: 8"></span>
            <div class="col-md-offset-2 col-md-3">
                <input class="form-control" type="text" name="email" value="<?=$get['email']?>">
            </div>
        </div>
        <!--end of email-->
        <div class="form-group">
            <label class="col-md-offset-3 col-md-1" style="margin-top: 10">Password</label>
            <div class="col-md-offset-2 col-md-3">
               <input class="form-control" type="password" name="email" value="<?=$get['password']?>">
            </div>
        </div>
        <!--end of password-->
        <div class="form-group">
            <label class="col-md-offset-3 col-md-1" style="margin-top: 10">Phone</label><span class="glyphicon glyphicon-earphone form-control-feedback"style="margin-top: 8"></span>
            <div class="col-md-offset-2 col-md-3">
               <input class="form-control" type="text" name="email" value="<?=$get['phone']?>">
            </div>
        </div>
        <!--end of phone-->
        <div class="form-group">
            <label class="col-md-offset-3 col-md-1" style="margin-top: 10">Gender</label><span class="glyphicon glyphicon-heart form-control-feedback"style="margin-top: 8"></span>
            <div class="col-md-offset-2 col-md-3">
               <input class="form-control" type="text" name="text" value="<?=$get['gender']?>">
            </div>
        </div>
        <!--end of gender-->
        <div class="form-group">
            <label class="col-md-offset-3 col-md-1" style="margin-top: 10">Address</label><span class="glyphicon glyphicon-globe form-control-feedback"style="margin-top: 8"></span>
            <div class="col-md-offset-2 col-md-3">
               <input class="form-control" type="text" name="text" value="<?=$get['address']?>">
            </div>
        </div>
        <!--end of address-->
         <div class="form-group">
            <label class="col-md-offset-3 col-md-1" style="margin-top: 10">Bio</label><span class="glyphicon glyphicon-info-sign form-control-feedback"style="margin-top: 8"></span>
            <div class="col-md-offset-2 col-md-3">
               <input class="form-control" type="text" name="text" value="<?=$get['bio']?>">
            </div>
        </div>

        <a style="margin-top: 20" type="button" class="up btn btn-success col-md-offset-5 col-md-2" name="edit" value="Edit" id="<?php echo $get["id"];?>" data-toggle="modal" data-target="#project1">Edit</a>
                      

    </div>
</form>
<?php }?>


 <div class="modal fade" id="project1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Edit profile </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      
      <div class="modal-body">
     
        <form class="form-horizontal" role="form" action="../controller/Sign_controller.php" method="post" enctype="multipart/form-data" >
         <div class="form-group">
            <label class="col-md-offset-2 col-md-1" style="margin-top: 10">edit image</label><span class="glyphicon glyphicon-info-sign form-control-feedback"style="margin-top: 8"></span>
            <div class="col-md-offset-1 col-md-5">
               <input class="form-control" type="file" name="user_pic" id="user_pic"><img src="../user_images/<?=$_SESSION["image"]?>" alt="simpleimg"  class="img-rounded img-responsive"width="50" height="50">
            </div>
        </div>
        <!--image-->
         <div class="form-group">
           <label class="col-md-offset-2 col-md-1 ">Name</label><span class="glyphicon glyphicon-user form-control-feedback"style="margin-top: 8"></span>

             <div class=" col-md-offset-1 col-md-5">
                 <input type="text" id="user_name"  name="user_name" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ" required>
                  <input type="hidden" name="id" id="id" value="<?php echo $user_id?>">
                 
            </div>      
         </div>
         
          <!--name-->

          <div class="form-group">
           <label class="col-md-offset-2 col-md-1 ">Email</label><span class="glyphicon glyphicon-envelope form-control-feedback"style="margin-top: 8"></span>

             <div class="col-md-offset-1 col-md-5">
                 <input type="text" id="email"  name="email" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ" required>
                 
            </div>      
         </div>
         <!--p-->
         <div class="form-group">
           <label class="col-md-offset-2 col-md-1 ">Password</label><span class="glyphicon glyphicon-user form-control-feedback"style="margin-top: 8"></span>

             <div class="col-md-offset-1 col-md-5">
                 <input type="password" id="password"  name="password" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ" required>
                 
            </div>      
         </div>
         <!---->
         <div class="form-group">
           <label class="col-md-offset-2 col-md-1 ">Phone</label><span class="glyphicon glyphicon-earphone form-control-feedback"style="margin-top: 8"></span>

             <div class="col-md-offset-1 col-md-5">
                 <input type="text" id="phone"  name="phone" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ" required>
                 
            </div>      
         </div>
         <!--ph-->
         <div class="form-group">
           <label class="col-md-offset-2 col-md-1 ">Gender</label><span class="glyphicon glyphicon-heart form-control-feedback"style="margin-top: 8"></span>

             <div class="col-md-offset-1 col-md-5">
                 <input type="text" id="gender"  name="gender" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ" required>
                 
            </div>      
         </div>
         <!--gen-->
         <div class="form-group">
           <label class="col-md-offset-2 col-md-1 ">Address</label><span class="glyphicon glyphicon-globe form-control-feedback"style="margin-top: 8"></span>

             <div class="col-md-offset-1 col-md-5">
                 <input type="text" id="address"  name="address" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ" required>
                 
            </div>      
         </div>
         <!--address-->
         <div class="form-group">
           <label class="col-md-offset-2 col-md-1 ">Bio</label><span class="glyphicon glyphicon-user form-control-feedback"style="margin-top: 8"></span>

             <div class="col-md-offset-1 col-md-5">
                 <input type="text" id="bio"  name="bio" class="form-control" placeholder="အက္ပဒိတ္လုုပ္ဖိုု့ အသစ္ထပ္ရိုုက္ထည့္ပါ" required>
                 
            </div>      
         </div>
         <!--bio-->

            <button type="submit" class=" btn btn-primary col-md-offset-5 col-md-2" id="update"  name="update">Update</button>

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
           var user_id = $(this).attr("id");
           console.log(user_id);  
           $.ajax({  
                 url:"../controller/Sign_controller.php",  
                method:"POST",  
                data:{user_id:user_id},  
                dataType:"json",  
                success:function(data){  
                     $('#user_name').val(data.name); 
                     $('#password').val(data.password);
                     $('#email').val(data.email);
                     $('#phone').val(data.phone);
                     $('#gender').val(data.gender);
                     $('#address').val(data.address);
                     $('#bio').val(data.bio);
                     $('#id').val(data.id);
                }  
           });  
        
      });  
    </script>


<?php

require_once "footer.php"

?>