<button data-id="{{ $id }}" id="deleteBtn" name="deleteBtn" type="button" class="btn btn-danger btn-lg active" role="button" data-toggle="modal" data-target="#deleteModal<?php echo $id; ?>">
  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
</button>

<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal<?php echo $id; ?>" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header" style="text-align: center; background: #455A64; color: white; border-radius: 5px 5px 0px 0px;">
        <h4 class="modal-title" style="text-align: center; display:inline; cursor:default;">Eliminar plantilla</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:inline;">
          <span aria-hidden="true" style="font-size: 30px;">&times;</span>
        </button>
      </div>

      <div class="modal-body-eliminarGrup">
        <h4>Segur que desitja eliminar la plantilla {{ $plantillas->nomPlantilla }}?</h4>
      </div>

      <div class="modal-footer" style="text-align: center;">
        <a href="{{url('/CU_28_EliminarPlantilla/' .$plantillas->idPlantilla )}}" type="button" onclick="eliminarPlantilla();" class="btn btn-danger" id="modalEliminar" style="margin-right: 25%;">
          Eliminar
        </a>


        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
