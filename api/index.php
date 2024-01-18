<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua Página de Destino</title>
    <!-- Adicione os estilos ou links para os estilos externos aqui -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>Seja Bem-vindo à Home Page!</h1>
        <!-- <p>Uma breve descrição sobre o que você está oferecendo.</p> -->
        <p>Conheça os nossos produtos!</p>
    </header>

    <section>
        <h2>Inscreva-se para receber atualizações</h2>
        <form action="processar_formulario.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <input type="submit" value="Inscrever">
        </form>
    </section>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Sua Empresa. Todos os direitos reservados.</p>
    </footer>

    <!-- Adicione os scripts ou links para os scripts externos aqui -->

</body>
</html>
