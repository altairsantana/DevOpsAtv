<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormulÃ¡rio de Cadastro</title>
</head>
<body>

<?php
// Verifica se o mÃ©todo de requisiÃ§Ã£o Ã© POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ObtÃ©m os dados do formulÃ¡rio
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    // Abre ou cria o arquivo de texto
    $arquivo = fopen("dados.txt", "a");
        
    // Escreve os dados no arquivo
    fwrite($arquivo, "Nome: $nome - Email: $email - Senha: $senha" . PHP_EOL);
    
    // Fecha o arquivo
    fclose($arquivo);
    
    // Exibe mensagem de sucesso
    echo "<h2>Cadastro realizado com sucesso!</h2>";
    echo "<p>Obrigado por se cadastrar.</p>";
} else {
    // Exibe o formulÃ¡rio
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

</body>
</html>
