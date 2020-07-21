<?php
$bd = new SQLite3("../db/cartuchos.db");

$sql = "ALTER TABLE cartuchos ADD COLUMN favorito INT DEFAULT 0";
if($bd->exec($sql)) echo "\nTabela  Cartuchos alterada com sucesso\n";
else echo "\nerro ao alterar tabela Cartuchos\n";