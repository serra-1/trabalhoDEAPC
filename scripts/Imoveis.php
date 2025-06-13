<?php

$db = new SQLite3('imoveis.db');

	// criação da tabela Imóveis
	//$db->exec("CREATE TABLE Imoveis(id INTEGER PRIMARY KEY, Tipo TEXT, Preco INT, Area INT, Tipologia INT, Casa_de_banho INT, Localizacao TEXT, Estado TEXT, Ano_de_construcao INT)"); //(1)
	$db->exec("INSERT INTO Imoveis(Tipo, Preco, Area, Tipologia, Casa_de_banho, Localização, Estado, Ano_de_construcao) VALUES('Moradia', '3500000', '250', 'T4', '3', 'Porto', 'Usado','2000')"); //(2)
	$db->exec("INSERT INTO Imoveis(Tipo, Preco, Area, Tipologia, Casa_de_banho, Localização, Estado, Ano_de_construcao) VALUES('Apartamento', '2500000', '150', 'T3', '3', 'Maia', 'Usado','2005')"); //(2)
	$db->exec("INSERT INTO Imoveis(Tipo, Preco, Area, Tipologia, Casa_de_banho, Localização, Estado, Ano_de_construcao) VALUES('Penthouse', '3000000', '300', 'T4', '4', 'Vila Nova de Gaia', 'Usado','2010')"); //(2)
	echo "<h3>Tabela De Imoveis </h3>";
	$sqlvar = "select * from Users ;";

	$result = $db->query($sqlvar); //(3)
	echo "<table>\n<th> Id </th><th> Tipo </th><th> Localizacao </th>\n";
	while ($row = $result->fetchArray(SQLITE3_ASSOC)) //(4)
 	{
	echo '<tr><td>' . $row['id'] . '</td><td>' . $row['Tipo'] . '</td><td>' .$row['Localizacao']
	. "</td></tr>\n";
	}
 	echo '</table>';
	unset($db);

?>
