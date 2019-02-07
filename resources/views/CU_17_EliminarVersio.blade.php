<button type="button" onclick="idDocument({{$document->idDocument}});" value="prueba" data-toggle="modal" data-target="#myModal_3" class="btn btn-primary">
    <span class="glyphicon glyphicon-trash"></span>
</button>
<div class="modal fade" tabindex="-1" role="dialog" id="myModal_3">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center; background: #455A64; color: white; border-radius: 5px 5px 0px 0px;">
                <h4 class="modal-title" style="text-align: center; display:inline; cursor:default;">Eliminar versió</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:inline;">
                    <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                </button>
            </div>
            <div class="modal-body-eliminarVersio">
                <h4 align='center'>Segur que desitja eliminar la següent versió?</h4>
                <input type="text" name="nombre_grupo" id="nombre_grupo" style="cursor: default; border: none; background: none;" disabled >
              
            </div>
            <div class="modal-footer" style="text-align: center;">
                <a href="{{url('eliminarVersio/'.$document->idDocument.'/'.$document->versioInterna)}}">
                    <button type="button" class="btn btn-danger" id="modalEliminar" style="margin-right: 25%;">
                    Eliminar
                </button></a>


                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>