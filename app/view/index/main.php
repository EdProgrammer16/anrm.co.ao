
  <div class="container-fluid py-4">
    <div class="row mt-5">
      <div class="col-lg-12">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner mb-4">
          <div class="carousel-item active">
            <div class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('<?= DIRIMG; ?>DJI_0131.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 my-auto">
                    <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Gestor ANRM</h4>
                    <h1 class="text-white fadeIn2 fadeInBottom">Introdução</h1>
                    <p class="lead text-justify text-white opacity-8 fadeIn3 fadeInBottom">Agência Nacional De Recursos Mineirais, Empresa Publica do Sector Mineiro .</p>
                    <div class="mt-5 text-center">
                      <a href="<?= DIRPAGE; ?>sign-in" class="btn btn-lg bg-gradient-primary">VER CONCESSÕES</a>
                    </div>
                  </div>
                  <div class="col-lg-6 my-auto">
                    <img class="w-75 img-fluid d-none d-md-block mx-auto z-index-1" src="<?= DIRIMG; ?>arnm2.png" alt="car image">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('<?= DIRIMG; ?>products/product-2-min.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 my-auto">
                    <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Trabalhos Feitos</h4>
                    <h1 class="text-white fadeIn2 fadeInBottom">Serviços</h1>
                    <p class="lead text-justify text-white opacity-8 fadeIn3 fadeInBottom">Fiscalizar e Concessionar.</p>
                    <div class="mt-5 text-center">
                      <!-- <a href="<?= DIRPAGE; ?>sign-in" class="btn btn-lg p-3 bg-gradient-primary">VER CONCESSÕES</a> -->
                      <a href="<?= DIRPAGE; ?>sign-in" class="btn btn-lg bg-gradient-primary">Ver Concessões</a>
                    </div>
                  </div>
                  <div class="col-lg-6 my-auto">
                    <img class="w-75 img-fluid d-none d-md-block mx-auto z-index-1" src="<?= DIRIMG; ?>arnm2.png" alt="car image">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="page-header min-vh-75 m-3 border-radius-xl" style="background-image: url('<?= DIRIMG; ?>products/product-details-1.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="container">
                <div class="row">
                  <div class="col-lg-6 my-auto">
                    <h4 class="text-white mb-0 fadeIn1 fadeInBottom">Locais</h4>
                    <h1 class="text-white fadeIn2 fadeInBottom">Endereço</h1>
                    <p class="lead text-justify text-white opacity-8 fadeIn3 fadeInBottom">Rua C Sector B Q6, No72, Talatona.
                      <span class="d-block text-center">Luanda, Angola.</span>
                    </p>
                    <div class="mt-5 text-center">
                      <a href="<?= DIRPAGE; ?>sign-in" class="btn btn-lg bg-gradient-primary">VER CONCESSÕES</a>
                    </div>
                  </div>
                  <div class="col-lg-6 my-auto">
                    <img class="w-75 img-fluid d-none d-md-block mx-auto z-index-1" src="<?= DIRIMG; ?>arnm2.png" alt="car image">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="min-vh-75 position-absolute w-100 top-0">
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon position-absolute bottom-50" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon position-absolute bottom-50" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>
      </div>
    </div>
    <!-- ============================== -->
    <?php include_once(DIRREQ.'/app/view/include/footer.php'); ?>
  </div>
</main>