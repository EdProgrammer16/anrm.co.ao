<script src="<?= DIRJS; ?>plugins/choices.min.js"></script>
<script src="<?= DIRJS; ?>plugins/multistep-form.js"></script>
<script>
    if (document.getElementById('choices-state')) {
      var element = document.getElementById('choices-state');
      const example = new Choices(element, {
        searchEnabled: false
      });
    };
  </script>

<script src="<?= DIRJS; ?>plugins/dragula/dragula.min.js"></script>
<script src="<?= DIRJS; ?>plugins/jkanban/jkanban.js"></script>