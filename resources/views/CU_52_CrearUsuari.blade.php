
<div class="modal fade" id="miModalNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="containerUser" class="modal-content">
            <div class="text-center darkColor">
                Crear nou usuari
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formNewUser" name="formNewUser" class="form-horizontal" method="POST" action="{{ url('/newUser') }}">
                <div class="controls">
                    {{ csrf_field() }}
                    <div>
                        <input type="text" name="cu52_idUsuari" id="cu52_idUsuari" value="" hidden/>
                    </div>
                    <div class="form-group">
                        <label for="nomUsuari" class="col-sm-3 control-label">Nom Usuari:</label>
                        <div class="col-sm-9">
                            <input type="text" name="cu_52nomUsuari" id="cu_52nomUsuari" class="form-control" placeholder="Nom Usuari" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contrasenya" class="col-sm-3 control-label">Contrasenya:</label>
                        <div class="col-sm-9">
                            <input type="password" name="cu_52contrasenya" id="cu_52contrasenya" class="form-control" placeholder="Contrasenya"  value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="col-sm-3 control-label">Nom:</label>
                        <div class="col-sm-9">
                            <input type="text" name="cu_52nom" id="cu_52nom" class="form-control" placeholder="Nom" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cognoms" class="col-sm-3 control-label">Cogmons:</label>
                        <div class="col-sm-9">
                            <input type="text" name="cu_52cognoms" id="cu_52cognoms" class="form-control" placeholder="Cognoms"  value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" name="cu_52email" id="cu_52email" class="form-control" placeholder="Email"  value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dadesPostals" class="col-sm-3 control-label">Dades Postals:</label>
                        <div class="col-sm-9">
                            <input type="text" name="cu_52dadesPostals" id="cu_52dadesPostals" class="form-control" placeholder="Dades Postals"  value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Estat:</label>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" id="cu_52estat" name="cu_52estat" value="1" checked required /> Alta
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="cu_52estat" name="cu_52estat" value="0" required /> Baixa
                            </label>
                        </div>
                        <div class="col-sm-5">
                            <select id="cu_52tipus" name="cu_52tipus" class="form-control" required>
                                <option value="" disabled selected>-- Tipus --</option>
                                <option value="Estandar">Estandar</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-right darkColor">
                    <button id="crear" class="btn btn-default btn-xs active botonCrearMod" type="submit">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>


