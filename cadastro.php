
    <?php

        if(empty($_POST['nome']) || empty($_POST['estado'])) {
            header('location: cad_fornecedor.html');
            exit();
        }

        require('conexao.php');

        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $cnpj = $_POST['cnpj'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];

        $sql = $pdo->prepare("insert into fornecedor 
        values (null, ?, ?, ?, ?, ?, ?)");
        $sql->execute(array($nome, $endereco, $cnpj, $cidade, $estado, $cep));
                        
    ?>
