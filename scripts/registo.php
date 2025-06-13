<?php

$db = new SQLite3('registo.db');

	// criação da tabela users
	//$db->exec("CREATE TABLE Users(id INTEGER PRIMARY KEY, Nome TEXT, Apelido TEXT, Data TEXT, Telefone INT, Email TEXT, Morada TEXT, Password TEXT, Permissao TEXT)"); //(1)
	$db->exec("INSERT INTO Users(nome, apelido, data, telefone, email, morada, Password, Permissao) VALUES('admin', 'admin', '01/01/2025', '999999999', 'admin@email.com', 'isep', 'Admin2025*','admin')"); //(2)
	$db->exec("INSERT INTO Users(nome, apelido, data, telefone, email, morada, Password, Permissao) VALUES('Pedro', 'Assunção', '01/01/2025', '999999999', '1071234@isep.ipp.pt', 'isep', 'Admin2025*','vendedor')"); //(2)
	$db->exec("INSERT INTO Users(nome, apelido, data, telefone, email, morada, Password, Permissao) VALUES('Duarte', 'Serra', '01/01/2025', '999999999', '1241055@isep.ipp.pt', 'isep', 'Admin2025*','cliente')"); //(2)
	echo "<h3>Tabela De Users </h3>";
	$sqlvar = "select * from Users ;";

	$result = $db->query($sqlvar); //(3)
	echo "<table>\n<th> Id </th><th> Nome </th><th> Apelido </th>\n";
	while ($row = $result->fetchArray(SQLITE3_ASSOC)) //(4)
 	{
	echo '<tr><td>' . $row['id'] . '</td><td>' . $row['Nome'] . '</td><td>' .$row['Apelido']
	. "</td></tr>\n";
	}
 	echo '</table>';
	unset($db);

?>
