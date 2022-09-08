<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagina</title>
</head>
<body>
<form method="POST" action="">
   <?php
    require 'conexao.php';
    if (isset($_POST['salvar'])):

      $Nomeproduto = $_POST['descricao'];       
     
      echo("Você cadastrou um produto com a descrção: ".$Nomeproduto); 

       $salvar = 'INSERT INTO tbl_produtos (descricao)';
       $salvar .= 'VALUES (:descricao)';
        try {
    $inserir = $pdo->prepare($salvar);
    $inserir->bindValue(':descricao', $Nomeproduto, PDO::PARAM_STR);
      
    $inserir->execute();

        echo("Salvo com Sucesso!");
              } 
        catch (PDOEException $exc) {
              echo "Algo deu errado!" . $exc->getTraceAsString();
              }                      
        endif;      
    ?>
  <label for="nome">Descrição do Produto:</label><br>
  <input type="text" id="fname" name="descricao"><br>
  <input type="submit" value="Cadastrar" name="salvar">
</form>
</body>
</html>