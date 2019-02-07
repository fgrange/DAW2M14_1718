
<div class="modal fade" id="miModalAlta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="containerUser" class="modal-content">
            <div class="text-center darkColor">
                Alta usuari
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAltaUser" name="formAltaUser" class="form-horizontal" method="POST" action="{{ url('/altaUser') }}">
                <div class="altaBaixa">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div>
                        <input type="text" name="cu47_idUsuari" id="cu47_idUsuari" value="" hidden/>
                    </div>
                    <div>
                        <label class="col-sm-5">Nom Usuari: </label>
                        <label id="cu47_nomUsuari" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Contrasenya: </label>
                        <label id="cu47_contrasenya" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Nom: </label>
                        <label id="cu47_nom" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Cognoms: </label>
                        <label id="cu47_cognoms" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Email: </label>
                        <label id="cu47_email" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Dades Postals: </label>
                        <label id="cu47_dadesPostals" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Tipus: </label>
                        <label id="cu47_tipus" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Grups: </label>
                        <label id="cu47_grups" class="col-sm-7"></label>
                    </div>

                </div>

                <div class="text-right darkColor">
                    <button id="donarAlta" class="btn btn-success" type="submit">Donar d'Alta</button>
                </div>
            </form>
        </div>
    </div>
</div>

