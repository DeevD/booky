<?php

    require_once "header.php";
    require_once "navigation.php";
    require_once "../controller/Genre_controller.php";
    $id = $_GET['id'];
    $genre = new Genre();

    $sql =  $genre->get($id);
        // var_dump($sql) or die();

    while ($get_data=mysql_fetch_array($sql)) {
    // var_dump($get_data);
?>
    <div class="jumbotron_custom">
            <div class="container">
            <div class="row" style="margin-top: 50px">
            <form class="form-horizontal " role="form" action="../controller/Genre_controller.php" method="post" >
            <div class="form-group">
            <label class="col-md-offset-2 col-md-1 ">Genre</label>
                <div class=" col-md-5">
                    <input type="text" value="<?=$get_data['genre_name']?>"  name="genre_name" class="form-control" placeholder="Enter Genre" >
                    <input type="hidden" name="id" value="<?=$get_data['id']?>">
                </div>
                <button type="submit" class=" btn btn-primary" name="update">Add</button>
            </div>
            </form>
            </div>
        </div>
        <?php } ?>
<!--end of form-->
