<?php
     @ini_set('discplay_errors', '1');
     error_reporting(E_ALL);
 
     
     $idFornecedor = $_POST["id_fornecedor"];
     $nome = $_POST["nomeProd"];
     $peso = $_POST["peso"];
     $precouni = $_POST["precoUnitario"];
     $precotot = $_POST["precoTotal"];
 
     $banco = mysqli_connect("localhost", "root", "");
     mysqli_select_db($banco, "estoque");
 
     $sql = "INSERT INTO produto VALUES(DEFAULT, '$idFornecedor', '$nome', '$peso', '$precouni', '$precotot')";
 
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
             <li><a href="cad_produto.html"><button>Voltar</button></a></li>
         </ul>
     </div> 
     
 </body>
 </html>
?>