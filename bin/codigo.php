<?php

// Função para validar o nome (somente letras)
function validarNome($nome) {
    return preg_match("/^[a-zA-Z\s]+$/", $nome);
}
// Função para validar o endereço
function validarEndereco($endereco) {
  
    return preg_match("/^[a-zA-Z0-9\s,.-]*$/", $endereco);
}

//CEP (formato XXXXX-XXX)
function validarCEP($cep) {
    return preg_match("/^\d{2}\d{3}-\d{3}$/", $cep);
}

//e-mail (formato padrão)
function validarEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

//formato (XX) XXXXX-XXXX
function validarTelefone($telefone) {
    return preg_match("/^\(\d{2}\)\s\d{5}-\d{4}$/", $telefone);
}

// Função para validar o CPF (somente números)
function validarCPF($cpf) {
    return preg_match("/^\d{11}$/", $cpf);
}

// Coletor os dados
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cep = $_POST['cep'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];

// codigo de Validação
$erros = [];

if (empty($nome) || !validarNome($nome)) {
    $erros[] = "Nome inválido. Deve conter apenas letras.";
}

if (empty($endereco)) {
    $erros[] = "Endereço não pode ser vazio.";
}

if (empty($cep) || !validarCEP($cep)) {
    $erros[] = "CEP inválido. O formato correto é: 72812-700.";
}

if (empty($email) || !validarEmail($email)) {
    $erros[] = "E-mail inválido !";
}

if (empty($telefone) || !validarTelefone($telefone)) {
    $erros[] = "Telefone inválido. O formato correto é: (61) 99999-9999.";
}

if (empty($cpf) || !validarCPF($cpf)) {
    $erros[] = "CPF inválido. Somente números são permitidos.";
}

// Exibir erros
if (empty($erros)) {
    echo "Formulário enviado com sucesso!";
   
} else {
    echo "<h3>Erro(s) encontrado(s):</h3>";
    foreach ($erros as $erro) {
        echo "<p>$erro</p>";
    }
}

?>
