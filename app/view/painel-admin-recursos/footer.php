<div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md mt-lg-10">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">NOVO RECURSO MINERAL</h5>
        <i class="material-icons ms-3">file_upload</i>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="multisteps-form__form">
          <div class="row mt-3">
            <div class="col-12">
              <div class="input-group input-group-dynamic">
                <label class="form-label">Nome do Mineral</label>
                <input class="multisteps-form__input form-control" id="nome_mineral" type="text" />
                <div class="w-100"></div>
                <span class="text-primary d-none fw-bold" style="font-size: .78rem;" id="nome_error">Erro! Preencha o campo corretamente</span>
              </div>
            </div>
            <div class="col-12 mt-4">
              <div class="input-group input-group-dynamic">
                <label class="form-label">Tipo de Mineral</label>
                <input class="multisteps-form__input form-control" id="tipo_mineral" type="text" />
                <div class="w-100"></div>
                <span class="text-primary d-none fw-bold" style="font-size: .78rem;" id="tipo_error">Erro! Preencha o campo corretamente</span>
              </div>
            </div>
          <div class="col-12 mt-4">
            <div class="input-group input-group-static">
              <label class="form-label">cor do Mineral (Em Hexadecimal, Ex: #123456)</label>
              <input class="multisteps-form__input form-control" id="cor_mineral" type="text" />
              <div class="w-100"></div>
              <span class="text-primary d-none fw-bold" style="font-size: .78rem;" id="cor_error">Erro! Preencha o campo corretamente</span>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer border-0">
        <button class="btn btn-outline-primary mb-0" type="button" data-bs-dismiss="modal" title="Cancelar">Cancelar</button>
        <button class="btn bg-gradient-primary ms-auto mb-0" type="button" id="btn_salvar" title="Salvar">Salvar</button>
      </div>
    </div>
  </div>
</div>

<div class="fixed-plugin">
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
      </div>
    </div>
</div>