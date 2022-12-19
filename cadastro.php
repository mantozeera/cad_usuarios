<?php 
    include "header.php"; 

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    include "model/connect.php";

    $nome = '';
    $email = '';
    $senha = '';

    if(!empty($id)){
        $sql = "SELECT * FROM usuarios WHERE id = '$id'";
        $result = $conn->query( $sql );
        $usuario = $result->fetch(PDO::FETCH_ASSOC);
        $nome = $usuario['nome'];
        $email = $usuario['email'];
        $senha = $usuario['senha'];
    }

?> 

<div class="contorno">
    <div class="col-md-12">
        <h1>Cadastro de Usuários</h1>
        <form action="controller/cadastrar.php" method="post">
            <input type="hidden" name="id" value="<?=$id;?>">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="textnome">Nome</span>
                </div>
                <input type="text" class="form-control" name="nome" value="<?=$nome;?>" aria-label="Nome" aria-describedby="textnome" require>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="textemail">E-mail</span>
                </div>
                <input type="email" class="form-control" name="email" value="<?=$email;?>" aria-label="E-mail" aria-describedby="textemail" require>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="textsenha">Senha</span>
                </div>
                <input type="password" class="form-control" name="senha" value="<?=$senha;?>" aria-label="Senha" aria-describedby="textsenha" require>
            </div>

            <button style="float: right;" type="submit" class="btn btn-success">Salvar</button>
        </form>
        <?php if(!empty($id)): ?>
            <button style="float: right; margin-right: 10px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExemplo">Excluir</button>
        <?php endif; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir o usuário <span style="color: red;"><?=$nome;?></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <a  href="controller/excluir.php?id=<?=$id?>" id="btnExcluir" type="button" class="btn-delete btn btn-danger">Sim</a>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?> 


