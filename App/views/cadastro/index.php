<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= RESOURCE; ?>assets/css/all.css">
    <link rel="stylesheet" href="<?= RESOURCE; ?>assets/css/bootstrap.min.css">
    

    <link rel="stylesheet" href="<?= RESOURCE; ?>assets/css/login.css">
    <link rel="stylesheet" href="<?= RESOURCE; ?>assets/css/style.css">

    <title><?= TITLE; ?></title>
  </head>
  <body>    
<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
  <div class="container container-height">
    <div class="row row-height justify-content-center align-items-center">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <?php if(!empty($viewVar['msg'])): ?>
          <div class="alert <?= $viewVar['alert']; ?> alert-dismissible fade show mb-1" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?= $viewVar['msg']; ?>
          </div>
        <?php endif; ?>
        <div class="card card-signin mb-3">
          
          <div class="card-body">
            <h5 class="card-title text-center">Cadastre-se</h5>
            <form class="form-signin" method="POST">

              <div class="form-label-group">
                <input type="text" id="inputUserName" class="form-control" placeholder="Email address" name="userName" required autofocus>
                <label for="inputUserName">Nome de usuario</label>
              </div>

              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                <label for="inputEmail">Email</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required>
                <label for="inputPassword">Senha</label>
              </div>
              
              
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Cadastrar</button>
              <hr class="my-4">
              
            </form>
            <div class="form-label-group text-center"> 
              <a href="../login" class="btn btn-sm btn-outline-primary btn-block text-uppercase">Ja tem uma conta? Vem ca infeliz!</a>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="page-footer font-small unique-color-dark">

     

  </footer>
  <!-- Footer -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="<?= RESOURCE; ?>assets/js/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="<?= RESOURCE; ?>assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>