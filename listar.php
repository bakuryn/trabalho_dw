<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Peças</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
        @ini_set('discplay_errors', '1');
        error_reporting(E_ALL);

        $banco = mysqli_connect("localhost", "root", "");
        mysqli_select_db($banco, "estoque");

        $sql = "select * from fornecedor";

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
            <th>Nome</th>
            <th>Endereço</th>
            <th>CNPJ</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>CEP</th>
        </tr>
        <?php
            while($l = mysqli_fetch_array($resultado)){
                $id = $l["id_fornecedor"];
                $nome = $l["nome"];
                $endereco = $l["endereco"];
                $cnpj = $l["cnpj"];
                $cidade = $l["cidade"];
                $estado = $l["estado"];
                $cep = $l["cep"];

                echo"
                <tr>
                    <td>$id</td>
                    <td>$nome</td>
                    <td>$endereco</td>
                    <td>$cnpj</td>
                    <td>$cidade</td>
                    <td>$estado</td>
                    <td>$cep</td>
                    <td>
                        <a href=\"editar.php?id=$id\">[Editar]</a>
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