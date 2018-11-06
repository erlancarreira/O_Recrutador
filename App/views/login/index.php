<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Erlan Carreira</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= BASE; ?>/assets/css/all.css">
    <link rel="stylesheet" href="<?= RESOURCE;?>/bootstrap/dist/css/bootstrap.min.css" >
    

    <link rel="stylesheet" href="<?= BASE; ?>/assets/css/login.css">
    <link rel="stylesheet" href="<?= BASE; ?>/assets/css/style.css">

  </head>
  <body> 
  <main>   
    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
    <div class="container container-height">
      <div class="row row-height justify-content-center align-items-center">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          
          <?php if(!empty($alert->getAlert()['msg'])): ?>
          <div class="alert <?= $alert->getAlert()['type']; ?> alert-dismissible fade show mb-1" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <?= $alert->getAlert()['msg']; ?>
          </div>
          <?php endif ?>
          <div class="card card-signin mb-3">
            <div class="card-body">
              <h5 class="card-title text-center">Login</h5>
              <form class="form-signin" method="POST">
                <div class="form-label-group py-2">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email " name="email" required autofocus>
                  <label for="inputEmail">Email</label>
                </div>

                <div class="form-label-group py-2">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required>
                  <label for="inputPassword">Senha</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input name="remember_me" type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Ei, lembra de mim!</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
                <hr class="my-4">
                
              </form>
              <div class="form-label-group text-center"> 
                <a href="<?= BASE; ?>/cadastro" class="btn btn-sm btn-outline-primary btn-block text-uppercase">Ainda nao tem conta? Ta esperando o que!</a>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </main>
  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?= RESOURCE;?>/jquery/dist/jquery.min.js"></script>
  <script src="<?= RESOURCE;?>/popper.js/dist/umd/popper.js"></script>
  <script src="<?= RESOURCE;?>/bootstrap/dist/js/bootstrap.min.js"></script>
 
  <script src="<?= RESOURCE; ?>/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>