<div class="card">
  <div class="card-header">
    <div class="d-flex">
      <div class="col-auto">
        <h5 class="mb-0">
          <a href="<?= DIRPAGE; ?>home" class="btn text-secondary mb-md-0 px-2 py-1 me-2" type="button" style="border-radius: 100%" name="button"><i class="fa fa-arrow-left fa-2x"></i></a>
          <?= $params['breadcrumb'][count($params['breadcrumb']) - 1]; ?>
        </h5>
        <p class="text-sm mb-0">Exibição de todos os registros.</p>
      </div>
      <div class="col-auto ms-auto">
        <div class="dropdown d-inline">
          <a href="javascript:;" class="btn bg-gradient-dark dropdown-toggle" data-bs-toggle="dropdown" id="navbarDropdownMenuLink2" aria-expanded="false">
            Filtros
          </a>
          <ul class="dropdown-menu dropdown-menu-lg-start px-2 py-3" aria-labelledby="navbarDropdownMenuLink2" style="">
          <li><a class="dropdown-item border-radius-md" href="javascript:;" id="mineral"><span class="fw-bold">Recurso:</span> Mineral </a></li>
            <?php
            foreach($params['recursos'] as $key){
                if($key['rTipo'] == 'mineral'){
                echo '<li><a class="dropdown-item border-radius-md mineral" href="javascript:;" data-value="'.$key['rNome'].'"><span class="fw-bold">Recurso Mineral</span>: <span class="text-dark">'.$key['rNome'].'</span></a></li>';
                }
            }
            ?>
            <li><hr class="horizontal dark my-2"></li>
            <li><a class="dropdown-item border-radius-md" href="javascript:;" id="mineral"><span class="fw-bold">Recurso:</span> Inerte </a></li>
            <?php
            foreach($params['recursos'] as $key){
              if($key['rTipo'] == 'inerte'){
                echo '<li><a class="dropdown-item border-radius-md inerte" href="javascript:;" data-value="'.$key['rNome'].'><span class="fw-bold">Recurso Inerte</span>: <span class="text-dark">'.$key['rNome'].'</span></a></li>';
              }
          }
            
            ?>
            <!-- 
            <li><a class="dropdown-item border-radius-md text-danger" href="javascript:;">Remove Filter</a></li> -->
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
      <div class="dataTable-top">
                <div class="dataTable-dropdown">
                  <label>
                    <select class="dataTable-selector">
                      <option value="5">5</option>
                      <option value="10" selected="">10</option>
                      <option value="15">15</option>
                      <option value="20">20</option>
                      <option value="25">25</option>
                    </select> 
                    entries per page
                  </label>
                </div>
                <div class="dataTable-search">
                  <input class="dataTable-input bg-gradient-light" id="dataTable-input" placeholder="Pesquisar aqui..." type="text">
                </div>
      </div>
      <div class="dataTable-container">
        <table class="table table-flush dataTable-table" id="datatable-search">
          <thead class="thead-light">
                    <tr>
                      <th data-sortable="" style="width: 18.2583%;"><a href="#" class="dataTable-sorter">ID</a></th>
                      <th data-sortable="" style="width: 17.1172%;"><a href="#" class="dataTable-sorter">Denominação</a></th>
                      <th data-sortable="" style="width: 16.61%;"  ><a href="#" class="dataTable-sorter">NIF</a></th>
                      <th data-sortable="" style="width: 20.6674%;"><a href="#" class="dataTable-sorter">Titulo  Mineral</a></th>
                      <th data-sortable="" style="width: 22.6961%;"><a href="#" class="dataTable-sorter">Província</a></th>
                      <th data-sortable="" style="width: 11.7918%;"><a href="#" class="dataTable-sorter">Geolocalização</a></th>
                      <th data-sortable="" style="width: 11.7918%;"><a href="#" class="dataTable-sorter">Action</a></th>
                    </tr>
          </thead>
          <tbody>
                    <?php foreach($params['minerais'] as $key): ?>
                      <tr id="tr-<?= $key['mID']; ?>">
                        <td>
                          <div class="d-flex align-items-center">
                            <div class="form-check is-filled">
                              <input class="form-check-input" type="checkbox" id="customCheck1">
                            </div>
                            <p class="text-xs font-weight-normal ms-2 mb-0">#<?= $key['mID']; ?></p>
                            <p class="recurso d-none"><?= $key['mEM']; ?></p>
                          </div>
                        </td>
                        <td class="text-sm font-weight-normal">
                            <span class="my-2 denominacao" id="denominacao-<?= $key['mID']?>"><?= $key['mDen']; ?></span>
                        </td>
                        <td class="text-sm font-weight-normal">
                          <div class="d-flex align-items-center">
                            <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-2 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-sm" aria-hidden="true">done</i></button> -->
                            <span><?= $key['mNIF']; ?></span>
                          </div>
                        </td>
                        <td class="text-sm font-weight-normal">
                          <div class="d-flex align-items-center">
                            <?php
                              switch($key['mTM']) {
                                case 'tprospecao':
                                  $key['mTM'] = 'Título de Prospecção';
                                break;
                                case 'texploracao':
                                  $key['mTM'] = 'Título de Exploração';
                                break;
                                case 'amprospecao':
                                  $key['mTM'] = 'Alvará Mineral de Prospecção';
                                break;
                                case 'amexploracao':
                                  $key['mTM'] = 'Alvará Mineral de Exploração';
                                break;
                              }
                            ?>
                            <span><?= $key['mTM']; ?></span>
                          </div>
                        </td>
                        <td class="text-sm font-weight-normal">
                          <?php
                            foreach($params['provincias'] as $subKey):
                              if($subKey['pro_nome'] == $key['mPro'] ):
                          ?>
                          <span class="my-2"><?= $subKey['pro_titulo']; ?></span>
                          <?php
                              endif;
                            endforeach;
                          ?>
                        </td>
                        <td class="text-sm font-weight-normal">
                          <?php if($key['mGEO'] != ''): ?>
                            <a href="<?= $key['mGEO']?>" class="btn btn-sm text-xs btn-outline-dark h5 w-100" target="_blank">Ver Maps</a>
                          <?php else: ?>
                            <a href="#" class="btn btn-sm text-xs btn-outline-dark h5 disabled w-100">Indisponivel</a>
                          <?php endif; ?>
                        </td>
                        <td class="">
                          <a href="<?= DIRPAGE; ?>minas/ver/<?= $key['mID']?>" data-bs-toggle="tooltip" data-bs-original-title="Visualizar">
                            <i class="material-icons text-secondary position-relative me-3" style="font-size: 1.5rem;">visibility</i>
                          </a>
                          <?php if($params['usuario'][0]['usuario_perm'] == 'admin'): ?>
                          <a href="<?= DIRPAGE; ?>minas/edit/<?= $key['mID']; ?>" data-bs-toggle="tooltip" data-bs-original-title="Editar">
                            <i class="material-icons text-secondary position-relative me-3" style="font-size: 1.5rem;">drive_file_rename_outline</i>
                          </a>
                          <a href="<?= DIRPAGE; ?>minas/delete/<?= $key['mID']; ?>" data-bs-toggle="tooltip" data-bs-original-title="Deletar">
                            <i class="material-icons text-secondary position-relative" style="font-size: 1.5rem;">delete</i>
                          </a>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="dataTable-bottom">
        <div class="dataTable-info">Showing 1 to 10 of 12 entries</div>
        <nav class="dataTable-pagination">
          <ul class="dataTable-pagination-list">
            <li class="pager"><a href="#" data-page="1">‹</a></li>
            <li class="active"><a href="#" data-page="1">1</a></li>
            <li class=""><a href="#" data-page="2">2</a></li>
            <li class="pager"><a href="#" data-page="2">›</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>

<script>
  let dataTableInput = document.getElementById('dataTable-input');
  let denominacao    = document.getElementsByClassName('denominacao');
  dataTableInput.addEventListener('keyup', function(e){
    let i = 0;
    while(i != -1){
      if(denominacao[i]){
        let position = denominacao[i].innerHTML.includes(e.target.value);
        let denominacaoID     = document.getElementById(denominacao[i].id);
        let denominacaoParent = document.getElementById(denominacaoID.parentElement.parentElement.id);
        if(!position){
          denominacaoParent.style = 'display: none';
        }else {
          denominacaoParent.style = '';
        }
        i++;
      }else {
        i = -1;
      }
    }
  })
</script>
<script src="<?= DIRJS; ?>core/jquery.js"></script>
<script>
  $(document).ready(function(){
    $('.mineral').click(function(){
      let search = $(this).data('value');
      for(let i = 0; i < $('.recurso').length; i++){
        let position = $('.recurso')[i].innerText.includes(search);
        let denominacaoParent = document.getElementById($('.recurso')[i].parentElement.parentElement.parentElement.id);
        if(!position){
          denominacaoParent.style = 'display: none';
        }else {
          denominacaoParent.style = '';
        }
      }
    })
    $('.inerte').click(function(){
      let search = $(this).data('value');
      for(let i = 0; i < $('.recurso').length; i++){
        let position = $('.recurso')[i].innerText.includes(search);
        let denominacaoParent = document.getElementById($('.recurso')[i].parentElement.parentElement.parentElement.id);
        if(!position){
          denominacaoParent.style = 'display: none';
        }else {
          denominacaoParent.style = '';
        }
      }
    })
  })
</script>