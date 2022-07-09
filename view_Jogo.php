<?php 
  include "cabecalho.html";
  include "Jogo.php";
?>
<main role="main" class="container">  
  <div class="container my-5">
    <div class="bg-white p-5 rounded">
      <div class="col-sm-8 py-5 mx-auto">
        <h1 class="display-5 fw-normal">Jogos</h1>
        <div id="inclusao">
          <input type="button" value="Novo" class="btn btn-primary" id="incluir">                                       
        </div>
      </div>
      <table class="table" border="0" width="100%" align-items="center" margin="auto">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome</th>
          <th scope="col">Descrição</th>
          <th scope="col">Ativo</th>           
          <th scope="col"></th>
          <th scope="col"></th>
        <tr>
      </thead>           
      <?php
        $jogo = new Jogo();
        $listar = $jogo -> listar();
      ?>
    </div>    
  </div>
</main>
<div class="modal fade bg-dark" id="modal-inclusao" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-label">Cadastrar</h5>        
      </div>
      <div class="modal-body">        
        <label for="">Nome:</label><br>
        <input type="text" id="inserir_nome"><br>
        <label for="">Descrição:</label><br>
        <input type="text" id="inserir_descricao"><br>
        <label for="">Ativo:</label><br>
        <input type="checkbox" checked id="inserir_ativo"><br>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger cancelar" id="cancelar">Cancelar</button>
        <button type="button" class="btn btn-success" id="inserir">Cadastrar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-edicao">
  <div class="modal-dialog">
    <div class="modal-content">           
      <h2 class="modal-title" id="modal-titulo-edicao">Editar</h2>
      <div class="modal-body" id="modal-corpo-edicao">                              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger cancelar" id="cancelar">Cancelar</button>
        <button type="button" class="btn btn-success" id="alterar">Alterar</button>                
      </div>
    </div>
  </div>
</div>
<script src="js/controller_Jogo.js"></script>
<?php 
  include "rodape.html";
?>