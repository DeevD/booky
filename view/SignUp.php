<?php
    require_once "header.php";
    require_once "navigation.php";
?>
    
    <div class="container-fluid  responsive_bg_signup">
       
        <div class="container">
            <div class=" cus_form">
            <img class="cus_img img-circle" src="image/user3.png" alt="">
                <form name="myForm" class="form-horizontal text-center"  role="form" action="../controller/Sign_controller.php" method="post" onsubmit="return validateForm()" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-offset-1 col-md-1 cus_font">Name</label>
                    <div class=" col-md-offset-1 col-md-6">
                        <input type="text" name="name" class="form-control cus_input" placeholder="Enter Your Name" >
                    </div>
                </div>

                  <div class="form-group">
                        <label class="col-md-offset-1 col-md-1 cus_font">Password</label>
                      <div class="col-md-offset-1 col-md-6">
                        <input type="password" name="password"class="form-control cus_input " placeholder="Enter Your Password" >
                      </div>
                </div>
                <!---->
                   <div class="form-group">
                        <label class="col-md-offset-1 col-md-1 cus_font">Email</label>
                      <div class="col-md-offset-1 col-md-6">
                        <input type="text" name="email"class="form-control cus_input " placeholder="Enter Your email" >
                      </div>
                   </div>
                   <!---->
                     <div class="form-group">
                        <label class="col-md-offset-1 col-md-1 cus_font">Photo</label>
                      <div class="col-md-offset-1 col-md-6">
                        <input type="file" name="user_photo" id="file" class="form-control cus_input " >
                      </div>
                   </div>
                        <button type="submit" name = "insert" class=" btn btn-success  col-md-offset-5 col-md-2">SignUp</button>
            </form>
            </div>
            
        </div>
    </div>
    
    
     <script>
function validateForm() {
    var x = document.forms["myForm"]["name"].value;
    var y = document.forms["myForm"]["email"].value;
    var z = document.forms["myForm"]["password"].value;

    if (x == "" || y == "" || z=="") {
        alert("Form is empty Please fill this form");
        return false;
    }
}
</script>

<?php
    require_once "footer.php";
?>
