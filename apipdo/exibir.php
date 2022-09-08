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
            </tr>
        </thead>
        <tbody>
            <?php
            #Select da tabela de listagem
            $sqlRead = 'SELECT * FROM tbl_clientes';

            try {
                $read = $pdo->prepare($sqlRead);
                $read->execute();
            } catch (PDOException $e) {
                echo $e->getTMessage();
            }
            while ($rs = $read->fetch(PDO::FETCH_OBJ)) {
                ?>
                <tr>
                    <td><?php echo $rs->id; ?></td>
                    <td><?php echo $rs->nome; ?></td>                                                              
                </tr>
            <?php } ?>
        </tbody>
    </table>
        <br><!-- comment -->
<a href='index.php'><button>Voltar ao cadastro</button></a>
</body>
</html>