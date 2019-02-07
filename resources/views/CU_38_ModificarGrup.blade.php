<button id="editBtn" type="button" onclick="modificaGrup(this);" data-toggle="modal" data-target="#myModal_2" style="padding: 0; border: none; background: none;">
    <i class="glyphicon glyphicon-pencil"></i> 
</button>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal_2">
    <div id="modal_modificar" class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formEditGrup" name="formEditGrup" class="form-horizontal" method="POST" action="{{ url('/editGrup') }}">
                <div class="controls">
                    {{ method_field('PUT') }}
                    {{ csrf_field()  }}
                    <div class="modal-header" style="text-align: center; background: #455A64; color: white; border-radius: 5px 5px 0px 0px;">
                        <h4 class="modal-title" style="text-align: center; display:inline; cursor:default;">Modificar grup</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:inline;">
                            <a aria-hidden="true" style="font-size: 30px;">&times;</a>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="nom_Grup_Modificar" class="ui-hidden-accessible">Nom: </label>
                        <input type="text" name="nom_Grup_Modificar" id="nom_Grup_Modificar" class="form-control" placeholder="Nom del grup" value="" style="cursor: default;">
                        @include('CU_39_ModificarMembres')
                    </div>
                    <div class="modal-footer" style="text-align: center;">
                        <button type="submit" class="btn btn-success" id="modalGuardar" style="margin-right: 25%;">Guardar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
