<div class="modal fade" id="miModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="containerUser" class="modal-content">
            <div class="text-center darkColor">
                Eliminar usuari
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDeleteUser" name="formEditUser" class="form-horizontal" method="POST" action="{{ url('/delUser') }}">
                <div class="controls">
                    {{ csrf_field() }}
                    <div><input type="text" name="cu43_idUsuari" id="cu43_idUsuari" value="" hidden /></div>
                    <div class="form-group">
                        <label for="nomUsuari" class="col-sm-3 control-label">Nom Usuari:</label>
                        <div class="col-sm-9">
                            <input type="text" name="cu43_nomUsuari" id="cu43_nomUsuari" class="form-control" placeholder="Nom Usuari" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contrasenya" class="col-sm-3 control-label">Contrasenya:</label>
                        <div class="col-sm-9">
                            <input type="password" name="cu43_contrasenya" id="cu43_contrasenya" class="form-control" placeholder="Contrasenya" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="col-sm-3 control-label">Nom:</label>
                        <div class="col-sm-9">
                            <input type="text" name="cu43_nom" id="cu43_nom" class="form-control" placeholder="Nom" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cognoms" class="col-sm-3 control-label">Cogmons:</label>
                        <div class="col-sm-9">
                            <input type="text" name="cu43_cognoms" id="cu43_cognoms" class="form-control" placeholder="Cognoms" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" name="cu43_email" id="cu43_email" class="form-control" placeholder="Email" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dadesPostals" class="col-sm-3 control-label">Dades Postals:</label>
                        <div class="col-sm-9">
                            <input type="text" name="cu43_dadesPostals" id="cu43_dadesPostals" class="form-control" placeholder="Dades Postals" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Estat:</label>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" id="cu43_estat1" name="cu43_estat" value="1" required /> Alta
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="cu43_estat0" name="cu43_estat" value="0" required /> Baixa
                            </label>
                        </div>
                        <div class="col-sm-5">
                            <select id="cu43_tipus" name="cu43_tipus" class="form-control" required>
                                <option value="" disabled selected>-- Tipus --</option>
                                <option value="Estandar">Estandar</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Grups:</label>
                        <div id="cu43_grup" class="col-sm-5"></div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary" disabled>Modificar Grups</button>
                        </div>
                    </div>
                </div>

                <div class="text-right darkColor">
                    <button id="eliminar" class="btn btn-danger btn-xs botonCrearMod" type="submit">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>

