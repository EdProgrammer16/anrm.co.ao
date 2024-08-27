<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y">
  <!-- Navbar -->
  <?php include_once(DIRREQ.'/app/view/include/navbar.php'); ?>
  <!-- End Navbar -->

  <div class="container-fluid py-4">
<div class="row min-vh-80">
<div class="col-lg-8 col-md-10 col-12 m-auto">
<h3 class="mt-3 mb-0 text-center">Novo Arquivo CSV</h3>
<p class="lead font-weight-normal opacity-8 mb-7 text-center">Use arquivos CSV para gerar cadastro rápido de uma ou varias concessções.</p>
<div class="card">
<div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
<div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
<div class="multisteps-form__progress">
<button class="multisteps-form__progress-btn js-active" type="button" title="Product Info">
<span>1. Arquivo CSV</span>
</button>
</div>
</div>
</div>
  <div class="card-body">
    <form class="multisteps-form__form" method="post" enctype="multipart/form-data" action="<?= DIRPAGE; ?>novo/addcsv">

        <div class="multisteps-form__panel pt-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
          <h5 class="font-weight-bolder">Arquivo do Excel</h5>
          <div class="multisteps-form__content">
            <div class="row mt-3">
              <div class="col-12">
                <label class="form-control mb-0">Arquivos aqui</label>
                <label for="archive" action="/file-upload" class="form-control border dropzone" id="productImg"></label>
                <input type="file" hidden="true" name="archive" id="archive" />
              </div>
            </div>
            <div class="button-row d-flex mt-0 mt-md-4">
              <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
              <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" title="Send">Send</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
  </div>
</div>

  <div class="position-fixed bottom-1 end-1 z-index-2">
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successToast" aria-atomic="true">
      <div class="toast-header border-0">
        <i class="material-icons text-success me-2">
        check
        </i>
        <span class="me-auto font-weight-bold">Notificação </span>
        <small class="text-body">Agora</small>
        <i class="fas fa-times text-md ms-3 cursor-pointer close" data-bs-dismiss="toast" aria-label="Close"></i>
      </div>
      <hr class="horizontal dark m-0">
      <div class="toast-body">
        Concessão Criada com sucesso!
      </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dangerToast" aria-atomic="true">
    <div class="toast-header border-0">
    <i class="material-icons text-danger me-2">
    campaign
    </i>
    <span class="me-auto text-gradient text-danger font-weight-bold">Alerta </span>
    <small class="text-body">Agora</small>
    <i class="fas fa-times text-md ms-3 cursor-pointer close" data-bs-dismiss="toast" aria-label="Close"></i>
    </div>
    <hr class="horizontal dark m-0">
    <div class="toast-body">
    Concessão não foi criada!
    </div>
    </div>
  </div>
  
  <?php include_once(DIRREQ.'/app/view/include/footer.php'); ?>

</div>
</main>