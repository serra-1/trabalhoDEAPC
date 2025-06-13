<?php
 echo "OLA";
 $db = new SQLite3('test.db');

 // criação da tabela Viaturas
 $db->exec("CREATE TABLE Viaturas(id INTEGER PRIMARY KEY, marca TEXT, preco INT)"); //(1)
 $db->exec("INSERT INTO Viaturas(marca, preco) VALUES('Fiat', 21644)"); //(2)
 $db->exec("INSERT INTO Viaturas(marca, preco) VALUES('Toyota', 35445)"); //(2)
 $db->exec("INSERT INTO Viaturas(marca, preco) VALUES('Cupra', 29090)"); //(2)
 echo "<h3>Tabela de Viaturas </h3>";
 $sqlvar = "select * from Viaturas ;";

 $result = $db->query($sqlvar); //(3)
 echo "<table>\n<th> Id </th><th> Marca </th><th> Preço </th>\n";
 while ($row = $result->fetchArray(SQLITE3_ASSOC)) //(4)
 {
 echo '<tr><td>' . $row['id'] . '</td><td>' . $row['marca'] . '</td><td>' . $row['preco']
. "</td></tr>\n";
 }
 echo '</table>';
 unset($db);
?> 