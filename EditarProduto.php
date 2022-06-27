<?php
   
    if(!empty($_GET['id'])){
        @ini_set('discplay_errors', '1');
        error_reporting(E_ALL);

        $id = $_GET["id"];        

        $banco = mysqli_connect("localhost", "root", "");
        mysqli_select_db($banco, "estoque");

        $sql = "SELECT * FROM produto WHERE id_produto=$id";

        $resultado = mysqli_query($banco, $sql);

        if($resultado->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($resultado)){
                $idProduto = $user_data["id_produto"];
                $idfornecedor = $user_data["id_fornecedor"];
                $nome = $user_data["nomeProd"];
                $peso = $user_data["peso"];
                $precouni = $user_data["precoUnitario"];
                $precotot = $user_data["precoTotal"];
                                
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
   <title>Controle de Restaurante</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body> 
   <div class="form">
           <div class="t">
               <h1>Cadastro de Produtos</h1>  
           </div>
           
           <form action="salvarEditarProd.php" method="post">            
               <!-- Form-->

               <label for="">Nome</label>
               <input type="text" name="nomeProd" size="10" maxlength="20" id="" value="<?php echo $nome?>" required>

               <label for="">CNPJ do fornecedor</label>
               <input type="text" name="id_fornecedor" size="10" maxlength="20" id="" value="<?php echo $idfornecedor?>" required>

               <label for="">Peso</label>
               <input type="text" name="peso" size="10" maxlength="10" id="" value="<?php echo $peso ?>" required>

               <label for="">Preço Unitário</label>
               <input type="text" name="precoUnitario" size="10" maxlength="10" id="" value="<?php echo $precouni?>" required>

               <label for="">Preço total</label>
               <input type="text" name="precoTotal" size="10" maxlength="10" id="" value="<?php echo $precotot?>" required>


               <!-- Botões-->
               <div class="bottom">
                   <input type="hidden" name="id" value="<?php echo $id ?>">
                   <input type="submit" name="update" id="update" value="Salvar">
                   <input type="reset" value="Limpar">                
               </div>                   
           </form>
           <a href="listarProduto.php"><button class="voltar">Voltar</button></a>
       </div> 
   
</body>
</html>
?>