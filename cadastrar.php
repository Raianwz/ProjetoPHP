<?php include "cabecalho.php" ?>

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
                <li class="tab"><a class="active" href="#test1">Todos</a></li>
                <li class="tab"><a href="#Jogados">Jogados</a></li>
                <li class="tab"><a href="#Favoritos">Favoritos</a></li>
            </ul>
        </div>
    </nav>

    <div class="row">
        <form method="POST">
            <div class="col s6 offset-s3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Cadastrar Jogo</span>
                        <!-- Input do Título -->
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="titulo" type="text" class="validate" name="titulo" require>
                                <label for="titulo">Título do Jogo</label>
                            </div>
                        </div>

                        <!-- Input da Sinopse -->
                        <div class="row">
                            <form class="col s12">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea name="lore" id="lore" class="materialize-textarea"></textarea>
                                        <label for="lore">Descrição</label>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Input da Nota -->
                        <div class="row">
                            <div class="input-field col s4">
                                <input name="nota" id="nota" type="number" step=".1" min="0" max="10" class="validate" require>
                                <label for="nota">Nota</label>
                            </div>
                        </div>

                        <!-- Input Capa do Filme -->
                        <div class="file-field input-field">
                            <div class="btn blue accent-1 black-text">
                                <span>Capa</span>
                                <input type="file" name="capa">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Enviar Capa" name="capa">
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn waves-effect waves-light grey" href="/">Cancelar</a>
                        <button type="submit" href="#" class="waves-effect waves-light btn blue accent-3">Confirmar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>