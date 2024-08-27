<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y">
  <!-- Navbar -->
  <?php include_once(DIRREQ.'/app/view/include/navbar.php'); ?>
  <!-- End Navbar -->

  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12 col-lg-8 m-auto">
        <div class="card">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <div class="multisteps-form__progress">
                <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">
                  <span>Informações do Usuário</span>
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form class="multisteps-form__form" action="<?= DIRPAGE; ?>novo/usuario" method="post">
              <div class="multisteps-form__panel border-radius-xl bg-white js-active" data-animation="FadeIn">
                  <h5 class="font-weight-bolder mb-0">Sobre o Usuário</h5>
                  <p class="mb-0 text-sm">informações Obrigatórias</p>
                  <div class="multisteps-form__content">
                    <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">Nome</label>
                          <input class="multisteps-form__input form-control" name="uNome" id="uNome" type="text" />
                        </div>
                      </div>
                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">Sobre Nome</label>
                          <input class="multisteps-form__input form-control" name="uSobreNome" id="uSobreNome" type="text" />
                        </div>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                      <select class="form-control" name="choices-state" id="choices-state">
                        <option value="normal" selected>Nível de Permissão</option>  
                        <option value="admin" >Adminnistrador</option>
                        <option value="moder">Técnico</option>
                        <option value="normal">Normal</option>
                      </select>
                      </div>
                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">Endereço de Email</label>
                          <input class="multisteps-form__input form-control" name="uEmail" id="uEmail" type="email" />
                        </div>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">Identidade ( BI / Passaport )</label>
                          <input class="multisteps-form__input form-control" name="uBI" id="uBI" type="text" />
                        </div>
                      </div>
                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">Password</label>
                          <input class="multisteps-form__input form-control" name="uPass" id="uPass" type="password" />
                        </div>
                      </div>
                    </div>
                    <div class="button-row d-flex mt-4">
                      <button class="btn bg-gradient-dark ms-auto mb-0" type="button" title="Send">Send</button>
                    </div>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="d-none row">
      <div class="col-12 col-md-6 col-lg-4 mx-auto my-5">
        <div class="card mb-9">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
              <h4 class="text-white font-weight-bolder text-center mt-2">
                <a href="<?= DIRPAGE; ?>painel-admin" class="btn text-white mb-md-0 px-2 py-1 me-2" type="button" style="border-radius: 100%" name="button"><i class="fa fa-arrow-left fa-2x"></i></a>
                <i class="fa fa-user"></i> Criar Usuário
              </h4>
            </div>
          </div>
          <div class="card-body">
            <form id="form" class="form" action="<?= DIRPAGE; ?>novo/usuario" method="post">
              <div class="input-group input-group-outline my-3">
                <label class="form-label">Nome</label>
                <input id="uNome" name="uNome" type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                <small>Error message</small>
              </div>
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Email</label>
              <input id="uEmail" name="uEmail" type="email" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
              <small>Error message</small>
            </div>
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Identidade</label>
              <input id="uBI" name="uBI" type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
              <small>Error message</small>
            </div>
            <div class="input-group input-group-outline my-3">
              <select id="uPerm" name="uPerm" class="form-control">
                <option>Permissão</option>
                <option class="admin">Adminnistrador</option>
                <option class="moder">Técnico</option>
                <option class="normal">Normal</option>
              </select>
              <small>Error message</small>
            </div>
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Password</label>
              <input id="uPass" name="uPass" type="password" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
              <small>Error message</small>
            </div>
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Confirm Password</label>
              <input id="uPassC" name="uPassC" type="password" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
              <small>Error message</small>
            </div>
            <button id="uSubmit" name="uSubmit" class="btn btn-primary mt-4">Criar Usuário</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
  <?php include_once(DIRREQ.'/app/view/include/footer.php'); ?>
</div>
</main>