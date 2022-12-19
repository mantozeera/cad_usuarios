<?php
    include "/model/connect.php";
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query( $sql );
    $rows = $result->fetchAll();
?>