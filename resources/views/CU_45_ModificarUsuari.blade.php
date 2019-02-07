
<div class="modal fade" id="miModalEdit" role="dialog" style="overflow-y: scroll;">
    <div class="modal-dialog">
        <div id="containerUser" class="modal-content">
            <div class="text-center darkColor">
                Modificar usuari
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditUser" name="formEditUser" class="form-horizontal" method="POST" action="{{ url('/editUser') }}">
                <div class="controls">
                    {{ csrf_field() }}
                    <div><input type="text" name="cu45_idUsuari" id="cu45_idUsuari" value="" hidden/></div>
                    <div class="form-group">
                        <label for="nomUsuari" class="col-sm-3 control-label">Nom Usuari:</label>
                        <div class="col-sm-9">
                            <input type="text" name="cu45_nomUsuari" id="cu45_nomUsuari" class="form-control" placeholder="Nom Usuari" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contrasenya" class="col-sm-3 control-label">Contrasenya:</label>
                        <div class="col-sm-9">
                            <input type="password" name="cu45_contrasenya" id="cu45_contrasenya" class="form-control" placeholder="Contrasenya" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nom" class="col-sm-3 control-label">Nom:</label>
                        <div class="col-sm-9">
                            <input type="text" name="cu45_nom" id="cu45_nom" class="form-control" placeholder="Nom" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cognoms" class="col-sm-3 control-label">Cogmons:</label>
                        <div class="col-sm-9">
                            <input type="text" name="cu45_cognoms" id="cu45_cognoms" class="form-control" placeholder="Cognoms" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" name="cu45_email" id="cu45_email" class="form-control" placeholder="Email" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dadesPostals" class="col-sm-3 control-label">Dades Postals:</label>
                        <div class="col-sm-9">
                            <input type="text" name="cu45_dadesPostals" id="cu45_dadesPostals" class="form-control" placeholder="Dades Postals" value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Estat:</label>
                        <div class="col-sm-4">
                            <label class="radio-inline">
                                <input type="radio" id="cu45_estat1" name="cu45_estat" value="1" required /> Alta
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="cu45_estat0" name="cu45_estat" value="0" required /> Baixa
                            </label>
                        </div>
                        <div class="col-sm-5">
                            <select id="cu45_tipus" name="cu45_tipus" class="form-control" required>
                                <option value="" disabled selected>-- Tipus --</option>
                                <option value="Estandar">Estandar</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Grups:</label>
                        <div id="cu45_grup" class="col-sm-5"></div>
                        <div class="col-sm-4">
                            <button type="button" id="modalModificarGrups" class="btn btn-primary" value="">Modificar Grups</button>
                        </div>
                    </div>
                </div>

                <div class="text-right darkColor">
                    <button name="modificar" class="btn btn-primary btn-xs" type="submit"><span class="glyphicon glyphicon-pencil"></span> Modificar </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ url('/js/jquery.min.js') }}"></script>
<script src="{{ url('/js/bootstrap.min.js') }}"></script>

