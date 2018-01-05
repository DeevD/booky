<?php

    require_once "header.php";
    require_once "navigation.php";
    //require_once "../controller/Signup_controller.php";
     require_once "../controller/Sign_controller.php";
?>



    <div class="container bodyy">
       <form class="form-horizontal " role="form" action="../controller/Sign_controller.php" method="post">
           <div class="form-group bodyy">
               <input class="col-md-5" type="text" name="name" class="form-control">
           </div>
           <!---->
           <div class="form-group">
               <input class="col-md-5" type="password" name="password" class="form-control">
           </div>
       </form>
    </div>





        <div class="container-fluid  responsive_bg_signup">

            <div class="container">
                <div class="title_signup">
                    <p>Welcome to Book Liberay</p>
                </div>
                <div class="row">
                     <div class="col-md-3 form_style">
                         <img src="image/logo.png" width="200" height="200" alt="">
                     </div>
                     <div class="col-md-3 form_style">
                        <img src="image/logo.png" width="200" height="200" alt="">
                     </div>

                <div class="col-md-6  ">


                    <form  class="form-horizontal form_style thumbnail" role="form" action="../controller/Sign_controller.php" method="POST"enctype="multipart/form-data" >

                        <div class="form-group"> 
                            <label class="col-md-offset-1 col-md-8">Photo</label>
                            <div class="col-md-offset-1 col-md-8">
                          <input type="file" id="file" name="user_photo"> <img src="image/book_pic.png" alt="simpleimg"  class="img-rounded img-responsive">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-1 label_style">Name</label>
                            <div class="col-md-offset-1 col-md-8">
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 label_style">Email</label>
                            <div class="col-md-offset-1 col-md-8">
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 label_style">Password</label>
                            <div class="col-md-offset-1 col-md-8">
                                <input type="password" name="password" class="form-control" placeholder="Enter Your Password" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 label_style"> Confirm Password</label>
                            <div class="col-md-offset-1 col-md-8">
                                <input type="password" name="confirm_password" class="form-control" placeholder="Enter Your Password Again" >
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit"  class=" btn btn-primary  left_bottom col-md-offset-3 col-md-2">Cancel</button>
                            <button type="submit" name = "insert" class=" btn btn-success  left_bottom col-md-offset-2 col-md-2">SignUp</button>

                        </div>

                    </form>
                </div>
                </div>
            </div>
        </div>
       
    <?php
        require_once "footer.php";
    ?>