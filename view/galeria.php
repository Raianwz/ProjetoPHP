<?php include "view/cabecalho.php" ?>
<?php 
//session_start();
require "./util/Mensagem.php";

$cotroller = new JogosController();
$cartuchos = $cotroller->index();
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
        <?php if (!$cartuchos) echo "<p class='card-panel red lighten-4'>Nenhum Jogo cadastrado no Cartucho</p>" ?>
        <!-- Coluna Geral -->
        <?php foreach($cartuchos as $cartucho) :  ?>
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
        <?php endforeach ?>

        <!--- Fim da Coluna Geral -->
    </div>
    </div> 
        <?= Mensagem::mostrar(); ?>
        <script>
    document.querySelectorAll(".btn-fav").forEach(btn => {
      btn.addEventListener("click", e => {
        const id = btn.getAttribute("data-id")
        fetch(`/favoritar/${id}`)
          .then(response => response.json())
          .then(response => {
            if (response.success === "ok") {
              if (btn.querySelector("i").innerHTML === "favorite") {
                btn.querySelector("i").innerHTML = "favorite_border"
              } else {
                btn.querySelector("i").innerHTML = "favorite"
              }
            }
          })
          .catch(error => {
            M.toast({
              html: 'Erro ao favoritar'
            })
          })
      });
    });

    document.querySelectorAll(".btn-delete").forEach(btn => {
      btn.addEventListener("click", e => {
        const id = btn.getAttribute("data-id")
        const requestConfig = { method: "DELETE", headers: new Headers()}
        fetch(`/jogos/${id}`, requestConfig)
          .then(response => response.json())
          .then(response => {
            if (response.success === "ok") {
              const card = btn.closest(".col")
              card.classList.add("fadeOut")
              setTimeout(() => card.remove(), 1000)
            }
          })
          .catch(error => {
            M.toast({
              html: 'Erro ao excluir'
            })
          })
      });
    });
  </script>
</body>
</html>