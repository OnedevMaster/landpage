<?php
// Conectar ao banco de dados usando PDO (substitua com suas credenciais)
$host = "localhost";
$usuario = "root";
$senha = "";
$banco_de_dados = " lista_produtos_chatgpt";

try {
    $conexao = new PDO("mysql:host=$host;dbname=$banco_de_dados", $usuario, $senha);

    // Definir o modo de erro para exceções
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar a tabela de produtos
    $consulta = $conexao->query("SELECT * FROM tabela_produtos");
    $produtos = $consulta->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Lidar com exceções PDO
    echo "Erro de conexão: " . $e->getMessage();
} finally {
    // Fechar a conexão
    $conexao = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="caminho/para/seu/arquivo/estilos.css">
</head>
<body>

    <header>
        <h1>Lista de Produtos</h1>
    </header>

    <section>
        <h2>Produtos Cadastrados</h2>
        <ul>
            <?php foreach ($produtos as $produto) : ?>
                <li><?php echo $produto['nome_produto']; ?> - R$ <?php echo $produto['preco']; ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Sua Empresa. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
