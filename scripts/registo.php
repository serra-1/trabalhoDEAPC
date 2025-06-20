<?php

$db = new SQLite3('registo.db');

// Mostra a tabela com algum estilo
echo "
<style>
    table {
        border-collapse: collapse;
        width: 80%;
        margin: 20px;
        font-family: Arial, sans-serif;
    }
    th, td {
        border: 1px solid #999;
        padding: 8px 12px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>
";

echo "<h3>Tabela De Users </h3>";
$sqlvar = "SELECT * FROM Users;";
$result = $db->query($sqlvar);

echo "<table>
<tr>
    <th>Id</th>
    <th>Nome</th>
    <th>Apelido</th>
    <th>Email</th>
    <th>Morada</th>
</tr>";

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['Nome']}</td>
        <td>{$row['Apelido']}</td>
        <td>{$row['Email']}</td>
        <td>{$row['Morada']}</td>
    </tr>";
}

echo "</table>";

unset($db);
?>
