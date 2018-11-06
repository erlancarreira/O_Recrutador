<div class="container">
  <div class="row">
    <div class="col">
      <form class="my-5 rtw-form" method="POST">
        
        <div class="form-group">
          <label for="profissao">Profissão</label>
          <input type="text" class="form-control" id="profissao" placeholder="Qual é a habilidade do seu recruta?" name="profissao" required>
        </div>
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" placeholder="Qual é o nome do seu recruta?" name="nome" required>
        </div>
        <div class="form-group">
          <label for="idade">Idade</label>
          <input type="number" class="form-control" min="16" max="120" id="idade" placeholder="Qual é a idade do seu recruta?" name="idade" required>
        </div>
        <div class="form-group">
          <label for="sexo">O sexo?</label>
          <select name="sexo" class="form-control" id="sexo">
            <option value="0">Homem</option>
            <option value="1">Mulher</option>
          </select>
    
        </div>
        <div class="form-group">
          <label for="sobre">Descreeva um pouco a habilidade do seu recruta!</label>
          <textarea name="sobre" class="form-control" id="sobre" rows="3" required></textarea>
        </div>
    
    
        <div class="form-row">
          <div class="form-group col-md-10">
            <label for="endereco" >Endereco</label>
            <input type="text" class="form-control" id="endereco" placeholder="Qual é o endereço do seu recruta" name="endereco" required>
          </div>
          <div class="form-group col-md-2">
            <label for="numero">Numero</label>
            <input name="numero" type="text" class="form-control" id="numero" placeholder="255A" required>
          </div>
        </div>
        <div class="form-row " data-action="ajaxController">
          <div class="form-group col-md-4">
            <label for="estado">Estado</label>
            <select name="estado" id="estado" class="form-control">
            <?php foreach($viewVar['estados'] as $key => $value): ?>
              <option value="<?= $value->id; ?>" ><?= $value->name ." - ". $value->uf; ?></option>
            <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="cidade">Cidade</label>
            <select name="cidade" id="cidade" class="form-control">
              <option>Selecione um estado</option>
            </select>
          </div>
          
          <div class="form-group col-md-2">
            <label for="cep">Cep</label>
            <input name="cep" type="text" class="form-control cep" id="cep"  placeholder="XXXXX-XXX" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm btn-block">Cadastrar</button>
      </form>
      <div id="demo"></div>
    </div>
  </div>
</div>

