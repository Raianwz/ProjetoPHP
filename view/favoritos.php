<?php include "view/cabecalho.php" ?>
<?php 
//session_start();
$cotroller = new JogosController();
$cartuchos = $cotroller->index();
?>
<body>

    <nav class="nav-extended grey darken-2">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right">
                <li><a href="/">Galeria</a></li>
                <li class="active"><a href="/novo">Cadastrar</a></li>
            </ul>
        </div>
        <div class="nav-header center">
            <h1>FLIPERAMA</h1>
        </div>
        <div class="nav-content black">
            <ul class="tabs tabs-transparent">
                <li class="tab"><a href="/">Todos</a></li>
                <li class="tab"><a href="#Jogados">Jogados</a></li>
                <li class="tab"><a class="active" href="/favoritos">Favoritos</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">  
<div class="row">
        <!-- Coluna Geral -->
        <?php foreach($cartuchos as $cartucho) :  ?>

        <?php if($cartucho->favorito): ?>
                <div class="col s7 m4 l4 xl3">
          <div class="card hoverable card-serie">
            <div class="card-image">
              <img src="<?= $cartucho->capa ?>" class="activator" />
              <button class="btn-fav btn-floating halfway-fab waves-effect waves-light red" data-id="<?= $cartucho->id ?>">
                <i class="material-icons"><?=($cartucho->favorito) ? "favorite" : "favorite_border"?></i>
              </button>
            </div>
            <div class="card-content">
              <p class="valign-wrapper">
                <i class="material-icons amber-text">star</i> <?= $cartucho->nota ?>
              </p>
              <span class="card-title activator truncate">
                <?= $cartucho->titulo ?>
              </span>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4"><?= $cartucho->titulo ?><i class="material-icons right">close</i></span>
              <p><?= substr($cartucho->lore, 0, 500) . "..." ?></p>
              <button class="waves-effect waves-light btn-small right red accent-2 btn-delete" data-id="<?= $cartucho->id ?>"><i class="material-icons">delete</i></button>
            </div>
          </div>
            </div>
        <?php endif ?>
        <?php endforeach ?>
</body>