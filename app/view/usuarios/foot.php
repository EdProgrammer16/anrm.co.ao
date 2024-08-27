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
<script src="<?= DIRJS; ?>plugins/jkanban/jkanban.js"></script>
<script src="<?= DIRJS; ?>core/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    // $('.linha').click(function(){
    // //   console.log();
    //   document.location.href = '<?= DIRPAGE; ?>concessoes/ver/'+$(this).data('id');
    // })
    $('.edit').click(function(){
        document.location.href = '<?= DIRPAGE; ?>concessoes/edit/'+$(this).data('id');
    })
    $('.delete').click(function(){
        // document.location.href = '<?= DIRPAGE; ?>concessoes/delete/'+$(this).data('id');
        alert("Delete")
    })
  })
</script>