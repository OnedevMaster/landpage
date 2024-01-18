<?php
// Função para validar e limpar os dados do formulário
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// Recupere os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = sanitize_input($_POST['nome']);
    $email = sanitize_input($_POST['email']);

    // Conectar ao banco de dados usando PDO (substitua com suas credenciais)
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $banco_de_dados = "formulario_chatgpt";

    try {
        $conexao = new PDO("mysql:host=$host;dbname=$banco_de_dados", $usuario, $senha);

        // Definir o modo de erro para exceções
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar se o nome já está cadastrado
        $verificar_nome = $conexao->prepare("SELECT COUNT(*) FROM tabela WHERE nome = :nome");
        $verificar_nome->bindParam(':nome', $nome);
        $verificar_nome->execute();

        if ($verificar_nome->fetchColumn() > 0) {
            echo "Desculpe, o nome já está cadastrado. Por favor, escolha outro nome.";
        } else {
            // Usar instrução preparada para inserir dados no banco de dados
            $stmt = $conexao->prepare("INSERT INTO tabela (nome, email) VALUES (:nome, :email)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);

            // Executar a instrução preparada
            if ($stmt->execute()) {
                // Inserção bem-sucedida
                
                /*echo "<h2>Obrigado por se inscrever!</h2>";

                echo '<meta http-equiv="refresh" content="2;url=index.php">';
                exit(); // Encerra o script após o redirecionamento
                */

                echo '<p><a href="cadastro_produtos.php">Cadastrar Produtos</a></p>';


                // Recuperar o ID do usuário inserido
                $id_usuario = $conexao->lastInsertId();

                /*
                // Exibir dados escapados, incluindo o ID do usuário
                echo "ID do Usuário: " . htmlspecialchars($id_usuario) . "<br>";
                echo "Nome: " . htmlspecialchars($nome) . "<br>";
                echo "Email: " . htmlspecialchars($email);
                */

                // Redirecionar para a tela principal após 2 segundos

                /*echo '<meta http-equiv="refresh" content="2;url=index.php">';
                exit(); // Encerra o script após o redirecionamento */


            } else {
                // Se ocorrer um erro na execução da instrução preparada
                echo "Erro ao processar a inscrição. Por favor, tente novamente.";
            }
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









