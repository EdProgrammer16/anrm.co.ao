
<script src="<?= DIRJS; ?>plugins/choices.min.js"></script>
<script src="<?= DIRJS; ?>plugins/flatpickr.min.js"></script>
<script src="<?= DIRJS; ?>plugins/multistep-form.js"></script>
<script src="<?= DIRJS; ?>plugins/quill.min.js"></script>


<script>
    if (document.getElementById('editor')) {
      var quill = new Quill('#editor', {
        theme: 'snow' // Specify theme in configuration
      });
    }

    if (document.getElementById('choices-multiple-remove-button')) {
      var element = document.getElementById('choices-multiple-remove-button');
      const example = new Choices(element, {
        removeItemButton: true
      });
    }

    if (document.querySelector('.datetimepicker')) {
      flatpickr('.datetimepicker', {
        allowInput: true
      }); // flatpickr
    }
    if (document.getElementById('provincia')) {
      var country = document.getElementById('provincia');
      const example = new Choices(country);
    }
    if (document.getElementById('titulo_mineral')) {
      var country = document.getElementById('titulo_mineral');
      const example = new Choices(country);
    }

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

    if (document.getElementById('area_ocupada_unidade')) {
      var element = document.getElementById('area_ocupada_unidade');
      const example = new Choices(element, {
        searchEnabled: false
      });
    };
    if (document.getElementById('caucao_moeda')) {
      var element = document.getElementById('caucao_moeda');
       const example = new Choices(element, {
        searchEnabled: false
      });
    };
    if (document.getElementById('valor_investimento_moeda')) {
      var element = document.getElementById('valor_investimento_moeda');
       const example = new Choices(element, {
        searchEnabled: false
      });
    };

    for(var i = 1; i <= 13; i++) {
      if (document.getElementById('choices-currency_'+i)) {
        var element = document.getElementById('choices-currency_'+i);
        const example = new Choices(element, {
          searchEnabled: false
        });
      };
    }

    if (document.getElementById('recursos_exploracao')) {
      var tags = document.getElementById('recursos_exploracao');
      const examples = new Choices(tags, {
        removeItemButton: true
      });

      examples.setChoices(
        [],
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
    // $('#btn_send').click(function(e){
    //   e.preventDefault();
    //   // =============================================
    //   // ============== Denominação ==================
    //   let n_processo            = $('#n_processo').val();
    //   let data_entrada_processo = $('#data_entrada_processo').val();
    //   let denminacao            = $('#denminacao').val();
    //   let representante_lega    = $('representante_lega').val();
    //   let email = $('#email').val();
    //   let contacto = $('#contacto').val();
    //   let provicias = $('#provicias').val();
    //   let area_ocupada = $('#area_ocupada').val()+$('#area_ocupada_unidade').val();
    //   let socio1 = $('#socio1').val();
    //   let socio2 = $('#socio2').val();
    //   // =============================================
    //   // ================ Título =====================
    //   let titulo_mineral         = $('#titulo_mineral').val();
    //   let n_mineral              = $('#n_mineral').val();
    //   let data_emissao_mineral   = $('#data_emissao_mineral').val();
    //   let data_validade_mineral  = $('#data_validade_mineral').val();
    //   let estado_procjeto        = $('#choices-currency1').val();
    //   let codigo_n               = $('#codigo_n').val();
    //   let data_emissao_codigo    = $('#data_emissao_codigo').val();
    //   let data_caducidade_codigo = $('#data_caducidade_codigo').val();
    //   let recursos_exploracao    = '';
    //   for(var i = 0; i < $('#recursos_exploracao').val().length; i++){
    //     recursos_exploracao    += $('#recursos_exploracao').val()[i]+' - ';
    //   }
    //   // =============================================
    //   // ================= Info ======================
    //   let data_inicio_negociacoes = $('#data_inicio_negociacoes').val();
    //   let data_rubrica_contratos  = $('#data_rubrica_contratos' ).val();
    //   let caucao                  = $('#caucao'                 ).val();
    //   let valor_investimento      = $('#valor_investimento'     ).val();
    //   let homens_nacionais        = $('#homens_nacionais'       ).val();
    //   let homens_estrangeiros     = $('#homens_estrangeiros'    ).val();
    //   let mulheres_nacionais      = $('#mulheres_nacionais'     ).val();
    //   let mulheres_estrangeiros   = $('#mulheres_estrangeiros'  ).val();
      
    //   let capacidade_tecnica      = $('#capacidade_tecnica'     ).val();
    //   let capacidade_financeira   = $('#capacidade_financeira'  ).val();
    //   // =============================================
    //   // ================= Bónus =====================
    //   let prestacao_1 = $('#prestacao_1').val()+$('#choices-currency_2').val();
    //   let prestacao_2 = $('#prestacao_1').val()+$('#choices-currency_3').val();
    //   let prestacao_3 = $('#prestacao_1').val()+$('#choices-currency_4').val();
    //   let prestacao_4 = $('#prestacao_1').val()+$('#choices-currency_5').val();
    //   let prestacao_5 = $('#prestacao_1').val()+$('#choices-currency_6').val();
    //   // =============================================
    //   // =============== Pagamento ===================
    //   let pagamento_taxa_superfice_1 = $('#pagamento_taxa_superfice_1').val()+$('#choices-currency_7').val();
    //   let pagamento_taxa_superfice_2 = $('#pagamento_taxa_superfice_2').val()+$('#choices-currency_8').val();
    //   let pagamento_taxa_superfice_3 = $('#pagamento_taxa_superfice_3').val()+$('#choices-currency_9').val();
    //   let pagamento_taxa_superfice_4 = $('#pagamento_taxa_superfice_4').val()+$('#choices-currency_10').val();
    //   let pagamento_taxa_superfice_5 = $('#pagamento_taxa_superfice_5').val()+$('#choices-currency_11').val();
    //   let pagamento_taxa_superfice_6 = $('#pagamento_taxa_superfice_6').val()+$('#choices-currency_12').val();
    //   let pagamento_taxa_superfice_7 = $('#pagamento_taxa_superfice_7').val()+$('#choices-currency_13').val();

    //   $('#recursos_exploracao').val(recursos_exploracao);
    //   recursos_exploracao = $('#recursos_exploracao').val();
    //   console.log(recursos_exploracao)
    //   // $.ajax({
    //   //   url: '<?= DIRPAGE; ?>novo/addconcessao',
    //   //   method: 'post',
    //   //   data: {
    //   //     // n_processo: n_processo,
    //   //     // data_entrada_processo: data_entrada_processo,
    //   //     // denminacao: denminacao,
    //   //     // representante_lega: representante_lega,
    //   //     // email: email,
    //   //     // contacto: contacto,
    //   //     // provicias: provicias,
    //   //     // area_ocupada: area_ocupada,
    //   //     // socio1: socio1,
    //   //     // socio2: socio2,
    //   //     // ==================================================
    //   //     // ==================================================
    //   //     // titulo_mineral: titulo_mineral,
    //   //     // n_mineral: n_mineral,
    //   //     // data_emissao_mineral: data_emissao_mineral,
    //   //     // data_validade_mineral: data_validade_mineral,
    //   //     // estado_procjeto: estado_procjeto,
    //   //     // codigo_n: codigo_n,
    //   //     // data_emissao_codigo: data_emissao_codigo,
    //   //     // data_caducidade_codigo: data_caducidade_codigo,
    //   //     // recursos_exploracao: recursos_exploracao,
    //   //     // ==================================================
    //   //     // ==================================================
    //   //     // data_inicio_negociacoes: data_inicio_negociacoes,
    //   //     // data_rubrica_contratos: data_rubrica_contratos,
    //   //     // caucao: caucao,
    //   //     // valor_investimento: valor_investimento,
    //   //     // homens_nacionais: homens_nacionais,
    //   //     // homens_estrangeiros: homens_estrangeiros,
    //   //     // mulheres_nacionais: mulheres_nacionais,
    //   //     // mulheres_estrangeiros: mulheres_estrangeiros,
    //   //     // ==================================================
    //   //     // ==================================================
    //   //     // prestacao_1: prestacao_1,
    //   //     // prestacao_2: prestacao_2,
    //   //     // prestacao_3: prestacao_3,
    //   //     // prestacao_4: prestacao_4,
    //   //     // prestacao_5: prestacao_5,
    //   //     // ==================================================
    //   //     // ==================================================
    //   //     pagamento_taxa_superfice_1: pagamento_taxa_superfice_1,
    //   //     pagamento_taxa_superfice_2: pagamento_taxa_superfice_2,
    //   //     pagamento_taxa_superfice_3: pagamento_taxa_superfice_3,
    //   //     pagamento_taxa_superfice_4: pagamento_taxa_superfice_4,
    //   //     pagamento_taxa_superfice_5: pagamento_taxa_superfice_5,
    //   //     pagamento_taxa_superfice_6: pagamento_taxa_superfice_6,
    //   //     pagamento_taxa_superfice_7: pagamento_taxa_superfice_7,

    //   //   },
    //   //   success: function(data){
    //   //     alert(data);
    //   //   },
    //   //   error: function(error){
    //   //     alert(error);
    //   //   }
    //   // })
    // })
    <?php if( $params['addConcessao'] == 'success'): ?>
      $('#successToast').each(function(){
        bootstrap.Toast.getInstance($(this)).show()
        // $(this).removeClass('hide');
        // $(this).addClass('show');
      })
      <?php elseif( $params['addConcessao'] == 'error'): ?>
        // $('#dangerToast').each(function(){
        //   $(this).removeClass('hide');
        //   $(this).addClass('show');
        // })
        var e = document.getElementById('dangerToast');
            e && bootstrap.Toast.getInstance(e).show()
      <?php endif; ?>
      $('.close').click(function(){
        let newUrl = document.location.href.replace('/error', '');
        let newUrl1 = document.location.href.replace('/success', '');
        document.location.href = newUrl;
        document.location.href = newUrl1;
        // alert(newUrl.replace('/error', ''));
      })

      $('#choices-currency_1').on('change', function(){
        switch($(this).val()){
          case 'Extinto':
            alert('Extinto');
          break;
          case 'Inoperante':
            alert('Inoperante');
          break;
          case 'Suspeção':
            alert('Suspeção');
          break;
        }
      })
  })
</script>

