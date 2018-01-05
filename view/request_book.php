<?php
    require_once "header.php";
    require_once "navigation.php";

?>
    <div class="thumbnail responsive_bg " style="margin-top: 20px; " >

    <div class="container" style=" padding: 20px; ">
        <div class="row">
            <form name="myForm" class="form-horizontal " onsubmit="return validateForm()" role="form" action="../controller/request_book.php" method="POST">
                <div class="form-group">
                    <label class=" col-md-offset-2 col-md-1 cus_font">Book Name</label>
                    <div class=" col-md-5">
                        <input class="form-control cus_input" type="text" name="book_name"  placeholder="Enter Book Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-md-offset-2 col-md-1 cus_font">Author Name</label>
                    <div class=" col-md-5">
                        <input class="form-control cus_input" type="text" name="author_name"placeholder="Enter Author Name">
                    </div>
                </div>
                <div class="col-md-offset-5 col-md-5">
                     <button type="submit"style="height:45px;background:pink" class=" btn btn-primary col-md-2" name="insert">Add</button>
                </div>



                
            </form>
            
        </div>


    </div>
    </div>
     <script>
function validateForm() {
    var x = document.forms["myForm"]["book_name"].value;
        var y = document.forms["myForm"]["author_name"].value;

    if (x == "" || y == "") {
        alert("Name is empty, Please Enter Book Name");
        return false;
    }
}
</script>

<?php
require_once "footer.php";
?>