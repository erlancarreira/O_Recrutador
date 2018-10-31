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
    <?php if(isset($viewVar['perfil']) && !empty($viewVar['perfil'])): ?>
    <div class="col-md-10 mx-auto">
      <form method="GET"> 
      <input type="hidden" name="idProfile" value="<?= $viewVar['perfil']->getIdProfile(); ?>"> 
      <input type="hidden" name="idUser" value="<?= $viewVar['perfil']->getIdUser(); ?>"> 
      <div class="card my-5 box-shadow text-center">
       <!--  <img class="card-img-top" src="..." alt="Card image cap"> -->
        <div class="card-header py-0">
          <h4>Recruta</h4> 
        </div>
        <div class="card-body">
          <img class="img-fluid userImage" src="<?= BASE; ?>/assets/img/user.png">
          <h5 class="card-title pt-3">Nome: <?= $viewVar['perfil']->getName(); ?></h5>
          <p class="card-text">Profissão: <?= $viewVar['perfil']->getCareer();  ?></p>
          <p class="card-text">Idade: <?= $viewVar['perfil']->getAge(); ?></p>
          <p class="card-text"><?= ($viewVar['perfil']->getGender() == 0) ? '<i class="fa fa-male fa-3x" aria-hidden="true"></i>' : '<i class="fa fa-female fa-3x" aria-hidden="true"></i>' ; ?></p>
          <p class="card-text">Sobre: <?= $viewVar['perfil']->getDescription(); ?></p> 
          <?php foreach($viewVar['estados'] as $key => $value): ?>
            <?= ($viewVar['perfil']->getState() == $value->id) ? "Estado: $value->uf." : '' ?> 
          <?php endforeach; ?>
          <?php foreach($viewVar['cidades'] as $key => $value): ?>
            <?= ($viewVar['perfil']->getCity() == $value->id) ? "Cidade: $value->name" : '' ?> 
          <?php endforeach; ?>
          
          <p class="card-text">Endereco: <?= $viewVar['perfil']->getAddress(); ?>, numero: <?= $viewVar['perfil']->getNumber(); ?>. Cep: <?= $viewVar['perfil']->getZip(); ?></p>
     
          <button type="submit" class="btn btn-primary">Contratar</button>   
        </div>
      </div>
      </form>
    </div>
   
    <!-- <?php// else: ?>
      <div class="col-md-12">
      <div class="card my-5 box-shadow text-center">
        <img class="card-img-top" src="..." alt="Card image cap"> 
        <div class="card-header py-0">
          <h4>Recrutador</h4> 
        </div>
        <div class="card-body">
          <h5 class="card-title text-capitalize"><? //(!empty($_SESSION['user']['userName'])) ? $_SESSION['user']['userName'] : ''; ?></h5>
          <p class="card-text">Ainda nao tem um recruta cadastrado?</p>
          <p class="card-text">Seja um recrutador e cadastre seus recrutas!</p>
          
        </div>
      </div>
    </div> -->
    <?php endif ?>
  </div>
</div>