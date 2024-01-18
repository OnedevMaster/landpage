<?php
// Função para validar e limpar os dados do formulário
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar e limpar os dados do formulário
    $nome_produto = sanitize_input($_POST['nome_produto']);
    $preco = sanitize_input($_POST['preco']);

    // Conectar ao banco de dados usando PDO (substitua com suas credenciais)
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco_de_dados = "lista_produtos_chatgpt";

    try {
        $conexao = new PDO("mysql:host=$host;dbname=$banco_de_dados", $usuario, $senha);

        // Definir o modo de erro para exceções
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Usar instrução preparada para inserir dados na tabela de produtos
        $stmt = $conexao->prepare("INSERT INTO tabela_produtos (nome_produto, preco) VALUES (:nome_produto, :preco)");
        $stmt->bindParam(':nome_produto', $nome_produto);
        $stmt->bindParam(':preco', $preco);

        // Executar a instrução preparada
        if ($stmt->execute()) {
            // Produto cadastrado com sucesso
            echo "<h2>Produto cadastrado com sucesso!</h2>";

            // Adicione um link para voltar para a página principal
            echo '<p><a href="index.php">Voltar para a página principal</a></p>';
            exit(); // Encerra o script após exibir a mensagem
        } else {
            // Se ocorrer um erro na execução da instrução preparada
            echo "Erro ao cadastrar o produto. Por favor, tente novamente.";
        }
    } catch (PDOException $e) {
        // Lidar com exceções PDO
        echo "Erro de conexão: " . $e->getMessage();
    } finally {
        // Fechar a conexão
        $conexao = null;
    }
}
?>
