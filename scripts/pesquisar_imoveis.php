<?php
// Ativa erros para debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Liga à base de dados SQLite
$db = new SQLite3('imoveis.db');

// Recolhe os filtros do formulário (via POST)
$localizacao = $_POST['localizacao'] ?? '';
$preco = $_POST['preco'] ?? 1000000;
$tipo = $_POST['tipo'] ?? '';
$quartos = $_POST['quartos'] ?? '';

// Grava filtros num ficheiro de log para debugging
file_put_contents("debug.log", json_encode($_POST, JSON_PRETTY_PRINT));

// Começa a query base
$query = "SELECT * FROM Imoveis WHERE preco <= :preco AND tipo = :tipo";

// Campos opcionais
if (!empty($localizacao)) {
    $query .= " AND LOWER(localizacao) LIKE :localizacao";
}
if (!empty($quartos)) {
    $query .= " AND quartos = :quartos";
}

// Prepara e associa os parâmetros
$stmt = $db->prepare($query);
$stmt->bindValue(':preco', (int)$preco, SQLITE3_INTEGER);
$stmt->bindValue(':tipo', $tipo, SQLITE3_TEXT);

if (!empty($localizacao)) {
    $stmt->bindValue(':localizacao', "%" . strtolower($localizacao) . "%", SQLITE3_TEXT);
}
if (!empty($quartos)) {
    $stmt->bindValue(':quartos', (int)$quartos, SQLITE3_INTEGER);
}

// Executa a query e constrói os resultados
$result = $stmt->execute();

$imoveis = [];
while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    $imoveis[] = $row;
}

// Devolve os dados como JSON com debug extra
header('Content-Type: application/json');
echo json_encode([
    "debug" => [
        "query" => $query,
        "filtros_recebidos" => $_POST
    ],
    "imoveis" => $imoveis
]);
?>
