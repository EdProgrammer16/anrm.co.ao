<style>
  .dataTable-input {
    background-image: linear-gradient(195deg,#ebeff4,#ced4da);
  }
  .coluna {
    cursor: pointer;
    transition: .4s all;
  }
  .coluna:hover {
    box-shadow: 0 10px 15px -3px rgba(0,0,0,.1),0 4px 6px -2px rgba(0,0,0,.05)!important;
    transform: scale(1.05);
  }
  .action {
    visibility: hidden;
    transition: .4s all;
  }
  .coluna:hover .action {
    visibility: visible;
  }
  .linha {
    cursor: pointer;
  }
</style>