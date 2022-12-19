<?php
    include "../model/connect.php";

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    $sql = "DELETE FROM usuarios WHERE id='$id'";

    $resultado = $conn->query($sql) OR trigger_error($conn->error, E_USER_ERROR);

    header('Location: http://localhost/cad_usuario/');
?>