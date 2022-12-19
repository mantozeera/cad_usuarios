<?php include "header.php"; ?> 

<?php
    include "model/connect.php";
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query( $sql );
    $usuarios = $result->fetchAll();
?>

<div class="contorno">
    <div class="col-md-12">
        <h1>Usuários Cadastrados</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="color: #606162;">Nome</th>
                    <th scope="col" style="color: #606162;">E-mail</th>
                    <th scope="col" style="color: #606162;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($usuarios as $value){ ?>
                    <tr>
                        <td><?=$value['nome'];?></td>
                        <td><?=$value['email'];?></td>
                        <td><a type="button" class="btn btn-primary" href="cadastro.php?id=<?=$value['id'];?>">Editar</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>



</script>

<?php include "footer.php"; ?> 