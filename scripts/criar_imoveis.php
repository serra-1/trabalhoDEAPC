<?php
// Liga à base de dados SQLite (cria ficheiro se não existir)
$db = new SQLite3('imoveis.db');

// Cria a tabela 'Imoveis' se ainda não existir
$db->exec("CREATE TABLE IF NOT EXISTS Imoveis (
    id INTEGER PRIMARY KEY,
    localizacao TEXT,
    preco INTEGER,
    tipo TEXT,
    quartos INTEGER,
    descricao TEXT
)");

// Inserir imóveis de exemplo
$db->exec("INSERT INTO Imoveis (localizacao, preco, tipo, quartos, descricao)
           VALUES ('Lisboa', 250000, 'apartamento', 2, 'Apartamento moderno no centro de Lisboa')");

$db->exec("INSERT INTO Imoveis (localizacao, preco, tipo, quartos, descricao)
           VALUES ('Porto', 180000, 'casa', 3, 'Casa com jardim e garagem no Porto')");

$db->exec("INSERT INTO Imoveis (localizacao, preco, tipo, quartos, descricao)
           VALUES ('Faro', 80000, 'terreno', 0, 'Terreno plano para construção em Faro')");

$db->exec("INSERT INTO Imoveis (localizacao, preco, tipo, quartos, descricao)
           VALUES ('Lisboa', 500000, 'comercial', 5, 'Espaço comercial com excelente localização')");

echo "<h3>Base de dados 'imoveis.db' criada e populada com sucesso!</h3>";
?>
