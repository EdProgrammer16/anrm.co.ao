<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y">
  <!-- Navbar -->
  <?php include_once(DIRREQ.'/app/view/include/navbar.php'); ?>
  <!-- End Navbar -->

  <div class="container-fluid my-3 py-3">
    <div class="row mb-5">
      <div class="col-lg-auto mx-auto mt-lg-0 mt-4">
      <?php foreach($params['ver_usuario'] as $key): ?>
        <form class="card mt-4 form" id="basic-info" method="post" action="<?= DIRPAGE; ?>usuarios/password/<?= $key['usuario_id']?>">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
              <h4 class="text-white font-weight-bolder text-center mt-2">
                <a href="<?= DIRPAGE; ?>painel-admin/usuarios" class="btn text-white mb-md-0 px-2 py-1 me-2" type="button" style="border-radius: 100%" name="button"><i class="fa fa-arrow-left fa-2x"></i></a>
                <i class="fa fa-user"></i> Alterar Senha para <?= $key['usuario_nome']; ?>
              </h4>
            </div>
          </div>
          <div class="card-body pt-0 mt-5">
            <!-- =-==========================-->
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Nova Password</label> 
              <input id="uPassN" name="uPassN" type="password" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
              <small id="uPassNSMS" class="text-primary my-2">Passwords Diferentes</small>
            </div>
            <!-- =-==========================-->
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Confirm Password</label>
              <input id="uPassC" name="uPassC" type="password" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" required>
              <small id="uPassCSMS" class="text-primary my-2">Passwords Diferentes</small>
            </div>
            <!-- =-==========================-->
            <div class="row mb-5">
              <div class="col-12">
                <div class="input-group input-group-static">
                  <button name="uSubmit" id="uSubmit" class="btn bg-gradient-primary mb-0 ms-auto">Alterar</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php include_once(DIRREQ.'/app/view/include/footer.php'); ?>
</div>
</main>
<script>
  let uPassN = document.getElementById('uPassN');
  let uPassC = document.getElementById('uPassC');

  let uPassNSMS  = document.getElementById('uPassNSMS');
  let uPassCSMS  = document.getElementById('uPassCSMS');
  uPassN.addEventListener('keyup' , function(e){
    if(e.target.value != uPassC.value){
      uPassNSMS.style = 'visibility: visible';
      uPassCSMS.style = 'visibility: visible';
    }else {
      uPassNSMS.style = 'visibility: hidden';
      uPassCSMS.style = 'visibility: hidden';
    }
  })
  uPassC.addEventListener('keyup' , function(e){
    if(e.target.value != uPassN.value){
      uPassNSMS.style = 'visibility: visible';
      uPassCSMS.style = 'visibility: visible';
    }else {
      uPassNSMS.style = 'visibility: hidden';
      uPassCSMS.style = 'visibility: hidden';
    }
  })
</script>