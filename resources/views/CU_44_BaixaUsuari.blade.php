
<div class="modal fade" id="miModalBaixa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="containerUser" class="modal-content">
            <div class="text-center darkColor">
                Baixa usuari
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formBaixaUser" name="formBaixaUser" class="form-horizontal" method="POST" action="{{ url('/baixaUser') }}">
                <div class="altaBaixa">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div>
                        <input type="text" name="cu44_idUsuari" id="cu44_idUsuari" value="" hidden />
                    </div>
                    <div>
                        <label class="col-sm-5">Nom Usuari: </label>
                        <label id="cu44_nomUsuari" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Contrasenya: </label>
                        <label id="cu44_contrasenya" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Nom: </label>
                        <label id="cu44_nom" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Cognoms: </label>
                        <label id="cu44_cognoms" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Email: </label>
                        <label id="cu44_email" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Dades Postals: </label>
                        <label id="cu44_dadesPostals" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Tipus: </label>
                        <label id="cu44_tipus" class="col-sm-7"></label>
                    </div>
                    <div>
                        <label class="col-sm-5">Grups: </label>
                        <label id="cu44_grups" class="col-sm-7"></label>
                    </div>

                </div>

                <div class="text-right darkColor">
                    <button id="donarBaixa" class="btn btn-success" type="submit">Donar de Baixa</button>
                </div>
            </form>
        </div>
    </div>
</div>



