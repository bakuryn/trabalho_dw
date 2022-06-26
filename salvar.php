<?php
    @ini_set('discplay_errors', '1');
    error_reporting(E_ALL);

    $nome=$_POST["nome"];
    $endereco=$_POST["endereco"];
    $cnpj=$_POST["cnpj"];
    $cidade=$_POST["cidade"];
    $estado=$_POST["estado"];
    $cep=$_POST["cep"];

    $banco = mysqli_connect("localhost", "root", "");
    mysqli_select_db($banco, "estoque");

    $sql = "INSERT INTO fornecedor VALUES(DEFAULT, '$nome', '$cnpj', '$cidade', '$estado', '$cep', '$endereco')";

    $resultado = mysqli_query($banco, $sql);

    mysqli_close($banco);

    if($resultado){
        echo "Salvo com sucesso";
    }else{
        echo "Erro ao salvar os dados no Banco";
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
        
    <!-- Botões-->
    <div class="container">
        <ul>
            <li><a href="cad_fornecedor.html"><button>Voltar</button></a></li>
        </ul>
    </div> 
    
</body>
</html>