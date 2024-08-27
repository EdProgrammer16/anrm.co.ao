<?php 
        $url = explode('/', $_SERVER["REQUEST_URI"]);
        $usuario = '';
        $pass = '';
        if(isset($url[3]) && $url[3] == 'error'){
          if(isset($url[4]) && $url[4] == 'usuario') {
            $usuario = 'border-danger';
          }
          if(isset($url[4]) && $url[4] == 'password') {
            $pass = 'border-danger';
          }
        }
        // $a = password_hash('Admin012', PASSWORD_BCRYPT);
        // echo $a;
?>
<main class="main-content mt-0">
  <div class="page-header align-items-start min-vh-100" style="background: url('<?= DIRIMG; ?>anrm-logo.png') no-repeat; background-size: 100% 100%">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Fazer Sign-in</h4>
                  <p class="mb-1 text-center text-sm text-white">Digite seu e-mail e senha para entrar</p>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" method="POST" action="<?= DIRPAGE; ?>sign-in/auth">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="uEmail" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="uPass" class="form-control">
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" name="uRem" id="rememberMe">
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="uSubmit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Não possui uma conta?
                    <a href="<?= DIRPAGE; ?>sign-up" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                  <p class="mt-4 text-sm text-center">
                    <a href="<?= DIRPAGE; ?>" class="text-primary text-gradient font-weight-bold">Voltar a Página Inicial</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- ============================== -->
    <footer class="footer position-absolute bottom-2 py-2 w-100">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              made by
              <a href="#" class="font-weight-bold" target="_blank">GEOSOL</a>
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="#" class="nav-link text-muted" target="_blank">GEOSOL</a>
              </li>
              <li class="nav-item">
                <a href="#/presentation" class="nav-link text-muted" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="#/blog" class="nav-link text-muted" target="_blank">Blog</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
</main>