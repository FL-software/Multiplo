<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Plataforma para criação de jogos de tabuleiro customizáveis!">
    <meta name="author" content="Bruno Trindade, Leonardo Maia">
    <meta name="generator" content="Múltiplo 1.0">
    <title>Múltiplo</title>
    <link href="https://getbootstrap.com/docs/5.2/examples/navbars-offcanvas/" rel="canonical">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/todos.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-dark bg-dark menu">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Múltiplo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarDark">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div id="offcanvasNavbarDark" class="offcanvas offcanvas-end text-white bg-dark" tabindex="-1">
          <div class="offcanvas-header">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Início</a>
              </li>
              <li class="nav-item dropdown">
                <a id="controle-de-acesso" href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Controle de acesso</a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="menu-view.php">Menus</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="perfil-view.php">Perfis</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a id="enredo" href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Enredo</a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="cenario-view.php">Cenarios</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="historia-view.php">Histórias</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="capitulo-view.php">Capítulos</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a id="pre-jogo" href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Pré-Jogo</a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="jogo-view.php">Jogos</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="tabuleiro-view.php">Tabuleiros</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="posicao-view.php">Posições</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="item-view.php">Itens</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="magia-view.php">Magias</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="regra-view.php">Regras</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a id="pre-jogo" href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Jogo</a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="partida-view.php">Partidas</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a id="jogador" href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">Jogador</a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="personagem-view.php">Personagens</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="sobre.php">Sobre</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <script src="js/jquery-3.6.0.js"></script>