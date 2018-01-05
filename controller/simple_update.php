<?php
    require_once "../model/db_connection.php";

    if(isset($_POST['genre_id']))
    {
         $query = " SELECT * FROM genre WHERE id = '".$_POST["genre_id"]."'";
        $result = mysql_query($query);
        $row = mysql_fetch_array($result);
        echo json_encode($row);
    }
?>