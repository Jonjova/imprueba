<div class="row d-flex justify-content-center">
    <h4 id="titulo">Nuevo registro de máquina</h4>
</div>
<div class="row d-flex justify-content-center">
    <div class=" p-3 mb-5 shadow col-lg-8">
        <form id="crear_editar">
            <div class="row">
                <div class="col-md-6 form-group">
                    <input type="hidden" id="M_ID" name="M_ID">
                    <input type="text" name="M_CODIGO" id="M_CODIGO" class="form-control" placeholder="Código">
                </div>
                <div class="col-md-6 form-group">
                    <input type="text" name="M_NOMBRE" id="M_NOMBRE" class="form-control" placeholder="Nombre">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <select name="M_TIPO_ID" id="M_TIPO_ID" class="custom-select"></select>
                </div>
                <div class="col-md-6 form-group">
                    <input type="text" name="M_DESCRIPCION" id="M_DESCRIPCION" class="form-control" placeholder="Descripción">
                </div>
            </div>
            <button type="buttom" id="save" class="btn btn-info">Guardar</button>
        </form>
    </div>
</div>