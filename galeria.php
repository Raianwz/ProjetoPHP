<?php include "cabecalho.php" ?>
<?php 
session_start();

require "./repository/JogosRepositoryPDO.php";
require "./util/Mensagem.php";

$jogoRepository =  new JogosRepositoryPDO();
$cartuchos = $jogoRepository->listarTodos();
?>
<body>
<nav class="nav-extended grey darken-2">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li class="active"><a href="/">Galeria</a></li>
                <li><a href="/novo">Cadastrar</a></li>
            </ul>
        </div>
        <div class="nav-header center">
            <h1>FLIPERAMA</h1>
        </div>
        <div class="nav-content black">
            <ul class="tabs tabs-transparent">
                <li class="tab"><a class="active" href="#todos">Todos</a></li>
                <li class="tab"><a href="#jogados">Jogados</a></li>
                <li class="tab"><a href="#favoritos">Favoritos</a></li>
            </ul>
        </div>
    </nav>
</body>
 <div class="container">  
<div class="row">
        <!-- Coluna Geral -->
        <?php foreach($cartuchos as $cartucho) :  ?>
            <div class="col s3">
                <div class="card hoverable">
                    <div class="card-image">
                        <img src="<?= $cartucho->capa ?>">

                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">favorite_border</i></a>
                    </div>
                    <div class="card-content">
                        <p class="valign-wrapper">
                            <i class="material-icons amber-text">star</i><?= $cartucho->nota ?>
                        </p>
                        <span class="card-title"><?= $cartucho->titulo ?></span>
                        <p><?= $cartucho->lore ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

        <!--- Fim da Coluna Geral -->
    </div>
    </div> 
        <?= Mensagem::mostrar(); ?>
</body>
</html>