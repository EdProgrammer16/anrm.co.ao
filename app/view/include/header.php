<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3  bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="<?= DIRPAGE; ?>">
            <img src="<?= DIRIMG; ?>arnm2.png" class="navbar-brand-img" style="min-height: 54px;margin-top: -7px" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white h3"><?= TITULO; ?></span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="<?= DIRPAGE; ?>dashboard" class="nav-link text-white <?php if($params['active'][0] == 'dashboard'){echo 'active bg-gradient-primary';} ?>" role="link">
                    <i class="material-icons-round opacity-10">dashboard</i>
                    <span class="nav-link-text ps-1 text-uppercase" style="font-size: .8rem;">Dashboard</span>
                </a>
            </li>
            <?php if($params['usuario'][0]['usuario_perm'] == 'superadmin' || $params['usuario'][0]['usuario_perm'] == 'admin' || $params['usuario'][0]['usuario_perm'] == 'moder'): ?>
            <li class="nav-item">
                <a href="<?= DIRPAGE; ?>painel-admin" class="nav-link text-white <?php if($params['active'][0] == 'painel-admin'){echo 'active bg-gradient-primary';} ?>" role="link">
                    <i class="material-icons-round opacity-10">admin_panel_settings</i>
                    <span class="nav-link-text ps-1 text-uppercase" style="font-size: .8rem;">Painel do Administrador</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= DIRPAGE; ?>usuarios" class="nav-link text-white <?php if($params['active'][0] == 'usuarios'){echo 'active bg-gradient-primary';} ?>" role="link">
                    <i class="material-icons-round opacity-10">person</i>
                    <span class="nav-link-text ps-1 text-uppercase" style="font-size: .8rem;">Usuários</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= DIRPAGE; ?>painel-admin/recursos" class="nav-link text-white <?php if($params['active'][0] == 'recursos'){echo 'active bg-gradient-primary';} ?>" role="link">
                    <i class="material-icons-round opacity-10">donut_small</i>
                    <span class="nav-link-text ps-1 text-uppercase" style="font-size: .8rem;">Recursos Mineiros</span>
                </a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a href="<?= DIRPAGE; ?>concessoes" class="nav-link text-white <?php if($params['active'][0] == 'concessoes'){echo 'active bg-gradient-primary';} ?>" role="link">
                    <i class="material-icons-round opacity-10">donut_small</i>
                    <span class="nav-link-text ps-1 text-uppercase" style="font-size: .8rem;">Concessões</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="https://qgiscloud.com/nonasqrt/CONCE_ES3" target="_blank" class="nav-link text-white" role="link">
                    <i class="material-icons-round opacity-10">public</i>
                    <span class="nav-link-text ps-1 text-uppercase" style="font-size: .8rem;">Mapa Interativo</span>
                </a>
            </li>
            <!-- ======================================== -->
        </ul>
        <hr class="horizontal light mt-0 mb-2">
    </div>
</aside>