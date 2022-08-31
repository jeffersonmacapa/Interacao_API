<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
  <form method="POST" action="">

   <?php
    require 'conexao.php';
    if (isset($_POST['salvar'])):

      $Nomecliente = $_POST['nome'];
              
      echo($Nomecliente."<br>"); 

       $sql = 'INSERT INTO tbl_clientes (nome)';
       $sql .= 'VALUES (:nome)';

        try {
        $inserir = $pdo->prepare($sql);
        $inserir->bindValue(':nome', $Nomecliente, PDO::PARAM_STR);                                                 
        $inserir->execute();
        echo("Salvo com Sucesso!");
              } 
        catch (PDOEException $exc) {
              echo "Algo deu errado!" . $exc->getTraceAsString();
              }           
           
        endif;
              ?>

  <label for="nome">Nome cliente:</label><br>
  <input type="text" id="fname" name="nome"><br><br>

  <input type="submit" value="Cadastrar" name="salvar">
</form>
</body>
</html>