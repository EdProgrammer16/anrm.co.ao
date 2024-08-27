<script src="<?= DIRJS; ?>plugins/choices.min.js"></script>
<script src="<?= DIRJS; ?>plugins/dropzone.min.js"></script>
<script src="<?= DIRJS; ?>plugins/quill.min.js"></script>
<script src="<?= DIRJS; ?>plugins/multistep-form.js"></script>
<script src="<?= DIRJS; ?>plugins/datatables.js"></script>

<script>
    if (document.getElementById('products-list')) {
      const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
        searchable: true,
        fixedHeight: false,
        perPage: 7
      });

      document.querySelectorAll(".export").forEach(function(el) {
        el.addEventListener("click", function(e) {
          var type = el.dataset.type;

          var data = {
            type: type,
            filename: "material-" + type,
          };

          if (type === "csv") {
            data.columnDelimiter = "|";
          }

          dataTableSearch.export(data);
        });
      });
    };
</script>
<script>
    if (document.getElementById('edit-deschiption')) {
      var quill = new Quill('#edit-deschiption', {
        theme: 'snow' // Specify theme in configuration
      });
    };

    if (document.getElementById('choices-category')) {
      var element = document.getElementById('choices-category');
      const example = new Choices(element, {
        searchEnabled: false
      });
    };

    if (document.getElementById('choices-sizes')) {
      var element = document.getElementById('choices-sizes');
      const example = new Choices(element, {
        searchEnabled: false
      });
    };

    if (document.getElementById('choices-currency')) {
      var element = document.getElementById('choices-currency');
      const example = new Choices(element, {
        searchEnabled: false
      });
    };

    if (document.getElementById('choices-tags')) {
      var tags = document.getElementById('choices-tags');
      const examples = new Choices(tags, {
        removeItemButton: true
      });

      examples.setChoices(
        [{
            value: 'One',
            label: 'Expired',
            disabled: true
          },
          {
            value: 'Two',
            label: 'Out of Stock',
            selected: true
          }
        ],
        'value',
        'label',
        false,
      );
    }
</script>

<script src="<?= DIRJS; ?>plugins/dragula/dragula.min.js"></script>
<script src="<?= DIRJS; ?>plugins/jkanban/jkanban.js"></script>

<script src="<?= DIRJS; ?>core/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('#btn_salvar').click(function(){
      let perm = 0;
      let nome_mineral = $('#nome_mineral').val();
      let tipo_mineral = $('#tipo_mineral').val();
      let cor_mineral  = $('#cor_mineral' ).val();

      let $nome_error = $('#nome_error');
      let $tipo_error = $('#tipo_error');
      let $cor_error  = $('#cor_error' );

      if(nome_mineral != ''){ 
        perm++;
        if(!$nome_error.hasClass('d-none')){$nome_error.addClass('d-none');}
      }else{ 
        $nome_error.removeClass('d-none');
      }
      if( cor_mineral  != '' && cor_mineral.includes('#') !== false && cor_mineral.length == 4
      ||  cor_mineral  != '' && cor_mineral.includes('#') !== false && cor_mineral.length == 7){ 
        perm++;
        if(!$cor_error.hasClass('d-none')){$cor_error.addClass('d-none');}
      }else{ 
        $cor_error.removeClass('d-none');
      }

      if(perm == 2){  
        $.ajax({
          url: '<?= DIRPAGE; ?>painel-admin/recursos',
          method: 'post',
          data: {
            nome_mineral: nome_mineral,
            tipo_mineral: tipo_mineral,
             cor_mineral: cor_mineral,
            submit_novo: ''
          },
          success: function(data){
            let url = document.location.href;
            document.location.href = url;
          }
        })
      }

    })
  })
</script>
