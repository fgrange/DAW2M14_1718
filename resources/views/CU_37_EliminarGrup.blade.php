<button id="deleteBtn" type="button" onclick="eliminaGrup(this);" data-toggle="modal" data-target="#myModal_3" style="padding: 0; border: none; background: none; margin-left: 20px; margin-right: 20px;">
    <i class="glyphicon glyphicon-trash"></i>
</button>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal_3">
    <div id="modal_eliminar" class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formDelGrup" name="formDelGrup" class="form-horizontal" method="POST" action="{{ url('/delGrup') }}">
                <div class="controls">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="modal-header" style="text-align: center; background: #455A64; color: white; border-radius: 5px 5px 0px 0px;">
                        <h4 class="modal-title" style="text-align: center; display:inline; cursor:default;">Eliminar grup</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="display:inline;">
                            <a aria-hidden="true" style="font-size: 30px;">&times;</a>
                        </button>
                    </div>
                    <div class="modal-body-eliminarGrup">
                        <h4>Segur que desitja eliminar el següent grup?</h4>
                        <h5 id="nombre_grupo"></h5>
                        <label for="password">Contrasenya:</label>
                        <input type="password" name="password" id="password" size="35" placeholder="Contrasenya administrador grup" required>
                        <h6>(funcio control confirmacio per contrasenya per desenvolupar)</h6>
                    </div>
                    <div class="modal-footer" style="text-align: center;">
                        <button type="submit" class="btn btn-danger" id="modalEliminar" style="margin-right: 25%;">
                            Eliminar
                        </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
