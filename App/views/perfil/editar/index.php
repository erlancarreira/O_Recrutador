
  <main class="col-md-8 mx-auto px-5">
    <form class="my-5" method="POST">
      <?php if(!empty($viewVar['msg'])): ?>
        <div class="alert <?= $viewVar['alert']; ?> alert-dismissible fade show mb-1" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?= $viewVar['msg']; ?>
        </div>
      <?php endif; ?> 
       <?php //var_dump($viewVar['cidades']); exit; ?>
      <?php if(isset($viewVar['perfil']) && !empty($viewVar['perfil'])): ?>
      
      <input type="hidden" name="idProfile" value="<?= $viewVar['perfil']->getIdProfile(); ?>"> 
      <input type="hidden" name="idUser" value="<?= $viewVar['perfil']->getIdUser(); ?>"> 
      
      <div class="form-group">
        <label for="profissao">Profissão</label>
        <input type="text" class="form-control" id="profissao" value="<?= $viewVar['perfil']->getCareer(); ?>" name="profissao">
      </div>
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" value="<?= $viewVar['perfil']->getName(); ?>" name="nome">
      </div>
      <div class="form-group">
        <label for="idade">Idade</label>
        <input type="number" class="form-control" id="idade" value="<?= $viewVar['perfil']->getAge(); ?>" name="idade">
      </div>
      <div class="form-group">
        <label for="sexo">Sexo</label>
        <select name="sexo" class="form-control" id="sexo">
          <option <?php ($viewVar['perfil']->getGender() == 0) ? 'active' : ''; ?> value="0">Homem</option>
          <option <?php ($viewVar['perfil']->getGender() == 1) ? 'active' : ''; ?> value="1">Mulher</option>
        </select>

      </div>
      <div class="form-group">
        <label for="sobre">Sobre o seu recruta</label>
        <textarea name="sobre" class="form-control " id="sobre" rows="3"><?= $viewVar['perfil']->getDescription(); ?></textarea>
      </div>
       
      <div class="form-row">
        <div class="form-group col-md-10">
          <label for="endereco">Endereco</label>
          <input type="text" class="form-control" id="endereco" value="<?= $viewVar['perfil']->getAddress(); ?>" name="endereco">
        </div>
        <div class="form-group col-md-2">
          <label for="numero">Numero</label>
          <input name="numero" type="text" class="form-control" id="numero" value="<?= $viewVar['perfil']->getNumber(); ?>">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="estado">Estado</label>
          <select name="estado" id="estado" class="form-control">
          <?php foreach($viewVar['estados'] as $key => $value): ?>
            <option value="<?= $value->id; ?>" <?= ($viewVar['perfil']->getState() == $value->id) ? 'selected' : '' ?> ><?= $value->name ." - ". $value->uf; ?></option>
          <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="cidade">Cidade</label>
          <select name="cidade" id="cidade" class="form-control">
          <?php foreach($viewVar['cidades'] as $key => $value): ?>
            <option value="<?= $value->id; ?>" <?= ($viewVar['perfil']->getCity() == $value->id) ? 'selected' : '' ?> data-estado="<?= $value->state; ?>" ><?= $value->name; ?></option>
          <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="cep">Cep</label>
          <input name="cep" type="text" max="9" min="9" value="<?= $viewVar['perfil']->getZip(); ?>" class="form-control" id="cep" pattern="\d{5}-?\d{3}">
        </div>
      </div>
      <button type="submit" class="btn btn-primary btn-sm btn-block">Atualizar</button>
      
      <?php endif; ?> 
      

    </form>
    
  </main>   
 
