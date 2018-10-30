<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
       
      <a class="navbar-brand mr-auto" href="<?= BASE; ?>">GetRecruit</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse nav justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav ">
              <li class="nav-item active mr-3">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li> -->
              <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
              <li class="nav-item dropdown mr-3">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Perfil
                </a>
                <div class="dropdown-menu mt-2" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="<?= BASE; ?>/perfil">Listar</a>
                  <a class="dropdown-item" href="<?= BASE; ?>/perfil/cadastrar">Cadastrar</a>                  
                </div>
              </li>
              <?php endif; ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            
            <?php if(!isset($_SESSION['user']) && empty($_SESSION['user'])): ?>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="<?= BASE; ?>/login">Login</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="<?= BASE; ?>/cadastro">Cadastre-se</a>
              </li>
            </ul>  
            <?php endif; ?>
        </div>
    </div>
        
</nav>

