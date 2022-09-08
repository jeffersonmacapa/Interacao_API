<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
    </head>
    <body>
        <?php
        require 'conexao.php';
        ?>
        <table width="467" border="1px">
            <tr>                
                <th>Cod</th>
                <th> Nome</th> 
                <th>Endereço</th>                                                           
            </tr>
        </thead>
        <tbody>
            <?php
            #Select da tabela de listagem
            $Mihaquery1 = 'SELECT * FROM tbl_clientes';
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
                    <td><?php echo $rs->endereco; ?></td>                                                             
                </tr>
            <?php } ?>
        </tbody>
    </table>
        <br><!-- comment -->
<a href='index.php'><button>Voltar ao cadastro</button></a>
</body>
</html>