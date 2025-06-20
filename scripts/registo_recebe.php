<?php
// Ativa mensagens de erro (útil para testes)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Conexão à base de dados SQLite
$db = new SQLite3('registo.db');

// Garantir que a tabela existe (executado só uma vez)
$db->exec("CREATE TABLE IF NOT EXISTS Users(
    id INTEGER PRIMARY KEY,
    Nome TEXT,
    Apelido TEXT,
    Data TEXT,
    Telefone TEXT,
    Email TEXT,
    Morada TEXT,
    Password TEXT,
    Permissao TEXT
)");

// Recolher os dados do formulário
$nome = $_POST['fname'];
$apelido = $_POST['lname'];
$data = $_POST['dataN'];
$telefone = $_POST['nTele'];
$email = $_POST['mail'];
$morada = $_POST['morada'];
$password = $_POST['password']; // Idealmente, deves fazer hash
$permissao = "cliente"; // Podes definir conforme o contexto

// Inserir na base de dados
$stmt = $db->prepare("INSERT INTO Users(Nome, Apelido, Data, Telefone, Email, Morada, Password, Permissao)
                      VALUES (:nome, :apelido, :data, :telefone, :email, :morada, :password, :permissao)");

$stmt->bindValue(':nome', $nome);
$stmt->bindValue(':apelido', $apelido);
$stmt->bindValue(':data', $data);
$stmt->bindValue(':telefone', $telefone);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':morada', $morada);
$stmt->bindValue(':password', $password); // ⚠️ usar hash no futuro
$stmt->bindValue(':permissao', $permissao);

$stmt->execute();

echo "<h3>Registo efetuado com sucesso!</h3>";
echo "<a href='registo.html'>Voltar ao formulário</a>";

unset($db);
?>
