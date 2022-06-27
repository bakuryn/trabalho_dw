<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        @ini_set('discplay_errors', '1');
        error_reporting(E_ALL);

        $banco = mysqli_connect("localhost", "root", "");
        mysqli_select_db($banco, "estoque");

        $sql = "select * from produto";

        $resultado = mysqli_query($banco, $sql);

        mysqli_close($banco);
    ?>

    <?php
        if(mysqli_num_rows($resultado) < 1){
            exit;
        }
    ?>

    <table width="50%" border ="1" align="center">
        <tr>
            <th>ID</th>
            <th>ID_Fornecedor</th>
            <th>Nome</th>
            <th>Peso</th>
            <th>Preço Unitário</th>
            <th>Preço Total</th>
            
        </tr>
        <?php
            while($l = mysqli_fetch_array($resultado)){
                $id = $l["id_produto"];
                $ID_fornecedor = $l["id_fornecedor"];
                $nome = $l["nomeProd"];
                $peso = $l["peso"];
                $precouni = $l["precoUnitario"];
                $precotot = $l["precoTotal"];
                

                echo"
                <tr>
                    <td>$id</td>
                    <td>$ID_fornecedor</td>
                    <td>$nome</td>
                    <td>$peso</td>
                    <td>$precouni</td>
                    <td>$precotot</td>
                    <td>
                        <a href=\"EditarProduto.php?id=$id\">[Editar]</a>
                        <a href=\"excluir.php?id=$id\">[Excluir]</a>
                    </td>

                </tr>\n";
            }
        ?>
    </table>
    <!-- Botões-->
    <div class="container">
        <ul>
            <li><a href="index.html"><button>Voltar</button></a></li>
        </ul>
    </div>  
</body>
</html>