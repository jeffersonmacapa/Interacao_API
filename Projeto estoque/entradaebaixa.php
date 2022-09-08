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
            <form method="POST" action="">

                <div class="h4 pb-2 mb-4 text-primary border-bottom border-primary text-center">
                    Entrada e baixa de inssumos
                </div>
                <?php
                require 'conexao.php';

                if (isset($_POST['entrada'])):
                    $Id = $_POST['id'];
                    $Estoque = $_POST['estoque'];                    
                    

                    echo("Entrada de {$Estoque} com sucesso!!!<br>");
             

                    $sql = 'UPDATE tbl_produtos SET estoque = estoque + :estoque WHERE id = :id';

                    try {
                        $inserir = $pdo->prepare($sql);                   
                        $inserir->bindValue(':estoque', $Estoque, PDO::PARAM_STR);                   
                        $inserir->bindValue(':id', $Id, PDO::PARAM_STR);                   
                        $inserir->execute();
                    } catch (PDOEException $exc) {
                        echo "Algo deu errado!" . $exc->getTraceAsString();
                    }
                    ?>           
                    <button onclick= "window.location.href = 'entradaebaixa.php';">
                        Novo lançamento</button>
                <?php
                endif;
                if (isset($_POST['saida'])):
                    $Id = $_POST['id'];
                    $Estoque = $_POST['estoque'];                    
                    

                    echo("Entrada de {$Estoque} com sucesso!!!<br>");
             

                    $sql = 'UPDATE tbl_produtos SET estoque = estoque - :estoque WHERE id = :id';

                    try {
                        $inserir = $pdo->prepare($sql);                   
                        $inserir->bindValue(':estoque', $Estoque, PDO::PARAM_STR);                   
                        $inserir->bindValue(':id', $Id, PDO::PARAM_STR);                   
                        $inserir->execute();
                    } catch (PDOEException $exc) {
                        echo "Algo deu errado!" . $exc->getTraceAsString();
                    }
                    ?>           
                    <button onclick= "window.location.href = 'entradaebaixa.php';">
                        Novo lançamento</button>
                    <?php
                else:
                    ?>
                    <div class="p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
                        <div class="input-group input-group-lg">
                            <select class="form-select form-select-lg mb-3" 
                                    aria-label=".form-select-lg example"
                                    name="id">
                                <option selected>Selecione o Produto</option>
                                <?PHP
                                $Buscaprodutos = $pdo->prepare("SELECT * FROM tbl_produtos order by descricao");
                                $Buscaprodutos->execute();
                                $Linha = $Buscaprodutos->fetchALL(PDO::FETCH_ASSOC);
                                foreach ($Linha as $Listar) {
                                    ?>                              
                                    <option value="<?php echo $Listar["id"]; ?>"><?php echo $Listar["descricao"]; ?></option>
                                <?php } 
                                ?>
                            </select>
                        </div>                  
                        <div class="input-group input-group-lg">
                            <span class="input-group-text" id="inputGroup-sizing-lg">Entrada e Saída</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" 
                                   aria-describedby="inputGroup-sizing-lg" name="estoque" 
                                   placeholder="Qtd da entrada ou Saída" >
                        </div>
                        <br>                     
                       <hr>
                        <button type="submit" class="btn btn-primary" name="entrada">Entrada</button>
                        <button type="submit" class="btn btn-primary" name="saida">Saída</button>
                        
                </form> 
<a href='listarprodutos.php'>
                    <button type="button" class="btn btn-primary">Listar Estoque</button></a>           
           
        </div>

<?php
endif;
?>
    <br>
    <a href="https://api.whatsapp.com/send?phone=5596988032988&text=Oi vi seu site"
       target="_blank"
       style="position:fixed;bottom:20px;right:30px;">
        <svg enable-background="new 0 0 512 512" width="50" height="50" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="M256.064,0h-0.128l0,0C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104  l98.4-31.456C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z" fill="#4CAF50"/><path d="m405.02 361.5c-6.176 17.44-30.688 31.904-50.24 36.128-13.376 2.848-30.848 5.12-89.664-19.264-75.232-31.168-123.68-107.62-127.46-112.58-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624 26.176-62.304c6.176-6.304 16.384-9.184 26.176-9.184 3.168 0 6.016 0.16 8.576 0.288 7.52 0.32 11.296 0.768 16.256 12.64 6.176 14.88 21.216 51.616 23.008 55.392 1.824 3.776 3.648 8.896 1.088 13.856-2.4 5.12-4.512 7.392-8.288 11.744s-7.36 7.68-11.136 12.352c-3.456 4.064-7.36 8.416-3.008 15.936 4.352 7.36 19.392 31.904 41.536 51.616 28.576 25.44 51.744 33.568 60.032 37.024 6.176 2.56 13.536 1.952 18.048-2.848 5.728-6.176 12.8-16.416 20-26.496 5.12-7.232 11.584-8.128 18.368-5.568 6.912 2.4 43.488 20.48 51.008 24.224 7.52 3.776 12.48 5.568 14.304 8.736 1.792 3.168 1.792 18.048-4.384 35.52z" fill="#FAFAFA"/></svg>
    </a>
    <br>
    <a href="https://www.facebook.com/jefferson.nascimento.58152"><p class="h5 text-center">&copy; Jefferson Nascimento</p></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>  
</body>
</html>