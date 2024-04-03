<?php
// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Configurações de conexão ao banco de dados
    $servername = "127.0.0.1"; // endereço do servidor
    $username = "user_%"; // nome do usuário do MySQL
    $password = "vagrant"; // senha do usuário do MySQL
    $dbname = "formulario"; // nome do banco de dados
    $tablename = "cadastro"; // nome da tabela

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Prepara a consulta SQL para inserir os dados
    $sql = "INSERT INTO $tablename (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Cadastro realizado com sucesso!</h2>";
        echo "<p>Obrigado por se cadastrar.</p>";
    } else {
        echo "Erro ao cadastrar: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
} else {
    // Exibe o formulário
?>
    <h2>Cadastro</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>
        
        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <input type="submit" value="Cadastrar">
    </form>
<?php
}
?>
