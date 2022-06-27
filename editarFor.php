<?php
    if(!empty($_GET['id'])){
        @ini_set('discplay_errors', '1');
        error_reporting(E_ALL);

        $id = $_GET["id"];        

        $banco = mysqli_connect("localhost", "root", "");
        mysqli_select_db($banco, "estoque");

        $sql = "SELECT * FROM fornecedor WHERE id_fornecedor=$id";

        $resultado = mysqli_query($banco, $sql);

        if($resultado->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($resultado)){
                $nome = $user_data["nome"];                
                $cnpj = $user_data["cnpj"];
                $cidade = $user_data["cidade"];
                $estado = $user_data["estado"];                
                $cep = $user_data["cep"];
                $endereco = $user_data["endereco"];               
            }         
        }
        else{
            header("Location:listar.php");
        }

        mysqli_close($banco);                
    }

    ?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body> 
    <div class="form">
            <div class="t">
                <h1>Cadastro de Fornecedor</h1>  
            </div>
            
            <form action="salvarEditarFor.php" method="post">            
                <!-- Form-->
                <label for="">Nome</label>
                <input type="text" name="nome" size="10" maxlength="20" id="" value="<?php echo $nome?>" required>

                <label for="">Endereço</label>
                <input type="text" name="endereco" size="10" maxlength="10" id="" value="<?php echo $endereco?>" required>

                <label for="">CNPJ</label>
                <input type="text" name="cnpj" size="10" maxlength="10" id="" value="<?php echo $cnpj?>" required>

                <label for="">Cidade</label>
                <input type="text" name="cidade" size="10" maxlength="10" id="" value="<?php echo $cidade?>" required>

                <label for="">Estado</label>
                <input type="text" name="estado" size="10" maxlength="10" id="" value="<?php echo $estado?>" required>

                <label for="">CEP</label>
                <input type="text" name="cep" size="10" maxlength="10" id="" value="<?php echo $cep?>" required>

                <!-- Botões-->
                <div class="bottom">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="update" id="update" value="Salvar">
                    <input type="reset" value="Limpar">                
                </div>                   
            </form>
            <a href="listar.php"><button class="voltar">Voltar</button></a>
        </div> 
    
</body>
</html>