<div class="container">
  <div class="row">
    <!-- <?php //foreach ($viewVar['perfil'] as $profile): ?> -->
    <div class="col-md-6 mx-auto">

      <?php if(!empty($viewVar['msg'])): ?>
        <div class="alert <?= $viewVar['alert']; ?> alert-dismissible fade show mb-1" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?= $viewVar['msg']; ?>
        </div>
      <?php endif; ?>
      <?php //var_dump(self::$message->has('msg')); ?> 
      <?php if(!empty($message)): ?>
        <div class="alert <?= $viewVar['alert']; ?> alert-dismissible fade show mb-1" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?= $viewVar['msg']; ?>
        </div>
      <?php endif; ?>
      <?php if(isset($viewVar['perfil']) && !empty($viewVar['perfil'])): ?>
      <form method="POST">
        <input type="hidden" name="idProfile" value="<?= $viewVar['perfil']->getIdProfile(); ?>"> 
        <input type="hidden" name="idUser" value="<?= $viewVar['perfil']->getIdUser(); ?>"> 
        <div class="card my-5 box-shadow text-center">
         <!--  <img class="card-img-top" src="..." alt="Card image cap"> -->
          <div class="card-header py-0">
            <h4>Recruta</h4> 
          </div>
          <div class="card-body">
            <h5 class="card-title">Tem certeza que deseja excluir o recruta abaixo?</h5>
            
            <p class="card-text text-capitalize"><?= $viewVar['perfil']->getName(); ?></p>
            

            <button type="submit" class="btn btn-success" formaction="<?= BASE; ?>/perfil/excluir">Confirmar</button>
            <button type="submit" class="btn btn-danger" formaction="<?= BASE; ?>/perfil">Cancelar</button>
          </div>
        </div>
      </form>
      <?php endif; ?>
    </div>
   <!--  <?php //endforeach; ?> -->
    
  </div>
</div>

