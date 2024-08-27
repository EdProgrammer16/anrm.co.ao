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
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Registre-se</h4>
                  <div class="row mt-3 d-none">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                      <i class="fa fa-instagram text-white text-lg"></i>
                        
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" method="POST" action="<?= DIRPAGE; ?>sign-up/register">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="uNome" class="form-control">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="uEmail" class="form-control">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Identidade</label>
                    <input type="text" name="uBI" class="form-control">
                  </div>
                  <div class="form-check form-check-info text-start ps-0">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked="">
                    <label class="form-check-label" for="flexCheckDefault">
                      Aceito os <a href="javascript:;" class="text-dark font-weight-bolder">Termos & Condições</a>
                    </label>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="uSubmit" id="uSubmit" class="btn bg-gradient-primary w-100 my-4 mb-2">Registrar</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Não possui uma conta?
                    <a href="<?= DIRPAGE; ?>sign-in" class="text-primary text-gradient font-weight-bold">Sign in</a>
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

<script type="text/javascript">
  let flexCheckDefault = document.getElementById('flexCheckDefault');
  if(!flexCheckDefault.checked) {
    let uSubmit = document.getElementById('uSubmit');
    let value = uSubmit.classList.length;
    uSubmit.classList.add('disabled');
  }
  flexCheckDefault.addEventListener('click', function(e){
    if(!flexCheckDefault.checked) {
      let uSubmit = document.getElementById('uSubmit');
      let value = uSubmit.classList.length;
      uSubmit.classList.add('disabled');
      // console.log(uSubmit.classList[value]);
    }else {
      let uSubmit = document.getElementById('uSubmit');
      let value = uSubmit.classList.length;
      uSubmit.classList.remove('disabled');
      // console.log(uSubmit.classList[value]);
    }
  })
</script>