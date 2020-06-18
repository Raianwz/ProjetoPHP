<?php

$bd = new SQLite3("cartuchos.db");

$sql = "DROP TABLE IF EXISTS cartuchos";

if($bd->exec($sql)) echo "\ntabela Cartuchos apagada\n";

$sql = "CREATE TABLE cartuchos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    titulo VARCHAR(200) NOT NULL,
    capa VARCHAR(200),
    lore TEXT,
    nota DECIMAL(2,1)
)";

if($bd->exec($sql)) echo "\nTabela  Cartuchos criada\n";
else echo "\nerro ao criar tabela Cartuchos\n";

$sql = "INSERT INTO cartuchos (titulo, capa, lore, nota) VALUES(
    'Sonic The Hedgehog (1991)',
    'https://www.dhresource.com/0x0/f2/albu/g10/M01/69/03/rBVaVlwkSVyAI35CAAe_CD9_Zdo716.jpg',
    'Numa tentativa de roubar as seis Esmeraldas do Caos e aproveitar o seu poder para controlar o mundo, o Dr. Ivo Robotnik (conhecido como Dr. Eggman na versão japonesa) aprisionou os animais da Ilha do Sul dentro de robots agressivos e de cápsulas metálicas estacionárias.',
    9.5
)";

if($bd->exec($sql)) echo "\nJogos inseridos no Cartucho\n";
else echo "\nErro ao inserir jogos no Cartucho\n";

$sql = "INSERT INTO cartuchos (titulo, capa, lore, nota) VALUES(
   'Pac-Man(1980)',
   'https://i.pinimg.com/originals/f7/2f/4a/f72f4a820d58b476e89cb786a0fef8e6.jpg',
   'Pac-Man (conhecido em japonês com o nome de Puckman ou パックマン) é um jogo eletrônico criado pelo Tōru Iwatani para a empresa Namco, e sendo distribuído para o mercado americano pela Midway Games. Produzido originalmente para Arcade no início dos anos 1980.',
   8.7
)";

if($bd->exec($sql))echo "\nJogos inseridos no Cartucho\n";
else echo "\nErro ao inserir jogos no Cartucho\n";

$sql = "INSERT INTO cartuchos (titulo, capa, lore, nota) VALUES(
    'Street Fighter II (1987)',
    'https://upload.wikimedia.org/wikipedia/pt/0/04/Flyer_japan_sf2.jpg',
    'O ditador M.Bison, organiza um torneio de artes marciais e convida os melhores lutadores do mundo. Porém o torneio não passa de uma fachada para seu plano de capturar os melhor guerreiros do mundo para poder lavar suas mentes e usá-los como soldados da Shadaloo.',
    9.7
 )";

if($bd->exec($sql))echo "\nJogos inseridos no Cartucho\n";
else echo "\nErro ao inserir jogos no Cartucho\n";

$sql = "INSERT INTO cartuchos (titulo, capa, lore, nota) VALUES(
    'Galaga (1981)',
    'https://i.pinimg.com/originals/d4/0c/05/d40c057c158184af2c0f615a25e7d83f.jpg',
    'Galaga é um jogo para arcade e a sequência de Galaxian. Foi lançado pela Namco em 1981 e uma versão foi lançada nos EUA no mesmo ano, sob a licença da Midway.O objetivo do jogo é a pontuação com pontos o maior possível, destruindo os inimigos em forma de insetos.',
    7.5
 )";

 if($bd->exec($sql))echo "\nJogos inseridos no Cartucho\n";
 else echo "\nErro ao inserir jogos no Cartucho\n";