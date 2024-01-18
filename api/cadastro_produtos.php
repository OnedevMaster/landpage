<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="caminho/para/seu/arquivo/estilos.css">
</head>
<body>

    <header>
        <h1>Cadastro de Produtos</h1>
    </header>

    <section>
        <h2>Cadastre um Novo Produto</h2>
        <form action="processar_cadastro_produto.php" method="post">
            <label for="nome_produto">Nome do Produto:</label>
            <input type="text" name="nome_produto" required>

            <label for="preco">Preço:</label>
            <input type="text" name="preco" required>

            <input type="submit" value="Cadastrar Produto">
        </form>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Sua Empresa. Todos os direitos reservados.</p>
    </footer>

</body>
</html>
