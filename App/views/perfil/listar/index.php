<div class="container">
  <div class="row">   
    <?php if(!empty($viewVar['msg'])): ?>
      <div class="alert <?= $viewVar['alert']; ?> alert-dismissible fade show mb-1" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <?= $viewVar['msg']; ?>
      </div>
    <?php endif; ?>
    <?php if(isset($viewVar['perfis']) && !empty($viewVar['perfis'])): ?>
    
    <?php foreach ($viewVar['perfis'] as $profile): ?>
    <div class="col-md-4">
      <form method="GET"> 
      <input formmethod="post" type="hidden" name="idProfile" value="<?= $profile->getIdProfile(); ?>"> 
      <input formmethod="post" type="hidden" name="idUser" value="<?= $profile->getIdUser(); ?>"> 
      <div class="card my-5 box-shadow text-center">
       <!--  <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-header py-0">
          <h4>Recruta</h4> 
        </div>
        <div class="card-body">
          <h5 class="card-title">Profissão: <?= $profile->getCareer(); ?></h5>
          <p class="card-text">Nome: <?= $profile->getName(); ?></p>
          <p class="card-text">Sobre: <?= $profile->getDescription(); ?></p>
          <input type="submit" value="Editar" class="btn btn-sm btn-outline-primary" formaction="<?= BASE; ?>/perfil/editar"> 
          <input type="submit" value="Excluir" class="btn btn-sm btn-danger" formaction="<?= BASE; ?>/perfil/excluir">
        </div>
      </div>
      </form>
    </div>
    <?php endforeach; ?>
    <?php else: ?>
      <div class="col-md-12">
      <div class="card my-5 box-shadow text-center">
       <!--  <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-header py-0">
          <h4>Recrutador</h4> 
        </div>
        <div class="card-body">
          <h5 class="card-title text-capitalize"><?= (!empty($_SESSION['user']['userName'])) ? $_SESSION['user']['userName'] : ''; ?></h5>
          <p class="card-text">Ainda nao tem um recruta cadastrado?</p>
          <p class="card-text">Cadastre agora mesmo!</p>
          <a class="btn btn-sm btn-primary" href="<?= BASE; ?>/perfil/cadastrar">Cadastrar</a>
          
        </div>
      </div>
    </div>
    <?php endif ?>
  </div>
</div>