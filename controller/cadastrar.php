
<?php

    include "../model/connect.php";
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    
    if(!empty($_POST["id"])){
        $id = $_POST["id"];
    }

    // print_r($id); die;

    if(!empty($id)){
        $sql = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha_hash' 
                WHERE id='$id'";
    }else{
        $sql = "INSERT INTO usuarios (nome, email, senha)
                VALUES ('$nome', '$email', '$senha_hash')";
    }

    $resultado = $conn->query($sql) OR trigger_error($conn->error, E_USER_ERROR);
    
    header('Location: http://localhost/cad_usuario/');
?>