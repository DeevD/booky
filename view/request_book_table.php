<?php
    require_once "header.php";
    require_once "navigation.php";
    require_once "../controller/Request_book.php";

    $req = new Request_book();
    $sql = $req->get_all();
    
    

?>

    <div class="container">
        <table class="table table-hover table-bordered" id="mytable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Time</th>
                    <th>Requested By</th>
                    <th>User Photo</th>                    
                </tr>   
            </thead>
            <tbody>
                <?php while($get = mysql_fetch_array($sql)){?>
                <tr>
                    <td><?=$get['id']?></td>
                    <td><?=$get['book_name']?></td>
                    <td><?=$get['author_name']?></td>
                    <td><?=$get['timestamp']?></td>
                    <td><?=$get['user_name']?></td>
                    <td><img src="../user_images/<?=$get['photo']?>" width="50" height="50" class="img-circle" alt=""></td>                   
                </tr>
                <?php }?>

            </tbody>
        </table>
    </div>
    <script>
        $('#mytable').dataTable();
    </script>

<?php 
    require_once "footer.php";

?>