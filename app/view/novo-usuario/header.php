<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sidenav-main" style="background: black!important">
<img src="<?= DIRIMG; ?>shapes/waves-white.svg" alt="pattern-lines" class="position-absolute opacity-2 start-0 top-0 h-100" style="z-index: -1">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="<?= DIRIMG; ?>logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white"><?= TITULO; ?></span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link text-white active" aria-controls="dashboardsExamples" role="button" aria-expanded="true">
            <i class="material-icons-round opacity-10">dashboard</i>
            <span class="nav-link-text ms-2 ps-1">Dashboards</span>
          </a>
          <div class="collapse show" id="dashboardsExamples" style="">
            <ul class="nav">
              <li class="nav-item active">
                <a class="nav-link text-white" href="<?= DIRPAGE; ?>home">
                  <span class="sidenav-mini-icon"> H </span>
                  <span class="sidenav-normal ms-2 ps-1"> Home </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white active" href="<?= DIRPAGE; ?>painel-admin">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal ms-2 ps-1"> Painel Admin </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="<?= DIRPAGE; ?>activities">
                  <span class="sidenav-mini-icon"> A </span>
                  <span class="sidenav-normal ms-2 ps-1"> Actividades </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white" href="<?= DIRPAGE; ?>perfil">
                  <span class="sidenav-mini-icon"> P </span>
                  <span class="sidenav-normal ms-2 ps-1"> Perfil </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8"></h6>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#componentsExamples" class="nav-link text-white collapsed" aria-controls="componentsExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">view_in_ar</i>
            <span class="nav-link-text ms-2 ps-1">Tipos De Minas</span>
          </a>
          <div class="collapse" id="componentsExamples" style="">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link text-white" href="<?= DIRPAGE; ?>minas/producao">
                  <span class="sidenav-mini-icon"> PD </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Tipo Produção </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="<?= DIRPAGE; ?>minas/prospeccao">
                  <span class="sidenav-mini-icon"> PP </span>
                  <span class="sidenav-normal ms-2 ps-1"> Tipo Prospecção </span>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link text-white " href="<?= DIRPAGE; ?>minas/exploracao">
                  <span class="sidenav-mini-icon"> EX </span>
                  <span class="sidenav-normal  ms-2  ps-1"> Tipo Exploração </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a data-bs-toggle="collapse" href="#provincias" class="nav-link text-white collapsed" aria-controls="componentsExamples" role="button" aria-expanded="false">
            <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">apps</i>
            <span class="nav-link-text ms-2 ps-1">Províncias</span>
          </a>
          <div class="collapse" id="provincias" style="">
            <ul class="nav">
              <?php foreach($params['provincias'] as $key):?>
                <li class="nav-item">
                  <a class="nav-link text-white" href="<?= DIRPAGE;?>minas/provincia/<?= $key['pro_nome'];?>">
                    <span class="sidenav-mini-icon text-uppercase"> <?= $key['pro_nome'][0] ?> </span>
                    <span class="sidenav-normal  ms-2  ps-1"> <?= $key['pro_nome'] ?> </span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </li>
        <!-- ======================================== -->
      </ul>
    </div>
  </aside>