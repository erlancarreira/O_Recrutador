
<div class="container">
  <div class="row">
    <?php //var_dump($viewVar['perfil']); exit; ?>
    <?php if(isset($viewVar['perfil']) && !empty($viewVar['perfil'])): ?>
    <?php foreach ($viewVar['perfil'] as $key => $profile): ?>
    <?php //var_dump($viewVar['perfil']); exit; ?>
    <div class="col-md-4">
      <form method="GET" action="<?php BASE; ?>visualizar" >
        <input type="hidden" name="idUser" value="<?= $profile->idUser; ?>">
        <input type="hidden" name="idProfile" value="<?= $profile->idProfile; ?>"> 
        <div class="card my-5 box-shadow text-center">
         <!--  <img class="card-img-top" src="..." alt="Card image cap"> -->
          <div class="card-header py-0">
            <h4>Recruta</h4> 
          </div>
          <div class="card-body">
            <img class="img-fluid userImage" src="<?= BASE; ?>/assets/img/user.png">
            <h5 class="card-title">Profissão: <?= $profile->career; ?></h5>
            <p class="card-text">Nome: <?= $profile->name; ?></p>
            <p class="card-text description">Sobre: <?= $profile->description; ?></p>
            <button type="submit" class="btn btn-sm btn-primary">Visualizar</button>
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
            <h4>Not Found</h4> 
          </div>
          <div class="card-body">
           
            <h4>Nenhum recruta encontrado!</h4>
            
          </div>
        </div>
      </form>
    </div>
     
    <?php endif; ?>
  </div>
</div>

