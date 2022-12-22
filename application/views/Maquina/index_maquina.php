<div class="container-fluid">

  <ul class="nav nav-tabs d-flex justify-content-center" id="myTab" role="tablist">
    <li class="nav-item d-flex p-1">
      <button class="nav-link active" id="lista-tab" data-toggle="tab" data-target="#lista" type="button" role="tab" aria-controls="lista" aria-selected="true">
        <h5> &nbsp;&nbsp; Lista de maquinas &nbsp;&nbsp; </h5>
      </button>
    </li>
    <li class="nav-item d-flex p-1">
      <button class="nav-link" id="formulario-tab" data-toggle="tab" data-target="#formulario" type="button" role="tab" aria-controls="formulario" aria-selected="false">
        <h5 id="nuevo_editar"> &nbsp;&nbsp;&nbsp; Registro de datos &nbsp;&nbsp;&nbsp; </h5>
      </button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <!-- Tab de listado -->
    <div class="  tab-pane fade show active" id="lista" role="tabpanel" aria-labelledby="lista-tab">
      <br>
      <div class="row mb-3 ">
        <button type="button" id="add" style="margin-left: 10%;" class=" btn btn-success">Nuevo registro</button>
      </div>
      <div class="row d-flex justify-content-center ">
        <div class="table-responsive-sm col-lg-10">
          <table id="Maquina" class="display table table-hover select-filter" style="width: 100%;">
            <thead class="thead-dark">
              <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Descripcion</th>
                <th>Acciones</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>

    </div>
    <!-- Tab de formulario -->
    <div class="tab-pane fade" id="formulario" role="tabpanel" aria-labelledby="formulario-tab"><?= $form_maquina ?></div>
  </div>
  <div style="display: none;" id="clickedTab"></div>

  <!-- Mantenimiento de maquinas -->
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/Maquina/crud_maquina.js"></script>