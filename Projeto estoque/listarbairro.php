<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  
    </head>
    <body>
        <div class="container p-2" >
        <?php
        require 'conexao.php';
        ?>
        <p class="fs-1">Listagem de Bairros cadastrados!!!</p>
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Cod</th>
      <th scope="col">Nome</th>
    </tr>
  </thead>
  <tbody>
    <?php
            #Select da tabela de listagem
            $Mihaquery1 = 'SELECT * FROM tbl_bairros';
            try {
                $Minhavariaveldeleitura = $pdo->prepare($Mihaquery1);
                $Minhavariaveldeleitura->execute();
            } 
            catch (PDOException $e) {
                echo $e->getTMessage();
            }

            while ($rs = $Minhavariaveldeleitura->fetch(PDO::FETCH_OBJ)) {
                ?>
                <tr>
                    <td><?php echo $rs->id; ?></td>
                    <td><?php echo $rs->nome; ?></td>                                                                             
                </tr>
            <?php } ?>
  </tbody>
</table>
        <a href='cadastrobairro.php'>
    <button type="button" class="btn btn-primary">
Voltar ao cadastro</button></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>