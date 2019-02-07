<button type="button" onclick="idDocument({{$document->idDocument}});" value="prueba" data-toggle="modal" data-target="#myModal_4" class="btn btn-primary">
    <i>Promocionar</i>
</button>
<div class="modal fade" tabindex="-1" role="dialog" id="myModal_4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center; background: #455A64; color: white; border-radius: 5px 5px 0px 0px;">
                <h4 class="modal-title" style="text-align: center; display:inline; cursor:default;">Promocionar versió</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:inline;">
                    <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                </button>
            </div>
            <div class="modal-body-eliminarVersio">
                <h4 align='center'>Segur que desitja promocionar la següent versió?</h4>
                <input type="text" name="nombre_grupo" id="nombre_grupo" style="cursor: default; border: none; background: none;" disabled >
              
            </div>
            <div class="modal-footer" style="text-align: center;">
                <a href="{{url('promocionarVersio/'.$document->idDocument.'/'.$document->versioInterna)}}">
                    <button type="button" class="btn btn-danger" id="modalPromocionar" style="margin-right: 25%;">
                    Promocionar 
                </button></a>


                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>