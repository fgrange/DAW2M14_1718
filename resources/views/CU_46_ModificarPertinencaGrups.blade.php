
<div class="modal fade" id="miModalModPerGrups" role="dialog">
    <div class="modal-dialog">
        <div id="containerUser" class="modal-content">
            <div class="text-center darkColor">
                Grups usuari
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formModPerGrups" name="formModPerGrups" method="POST" action="{{ url('/modPerGrups') }}">
                <div class="controls">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="altaBaixa">
                        <div>
                            <input type="text" name="cu46_idUsuari" id="cu46_idUsuari" value="" hidden />
                        </div>
                        <div>
                            <label class="col-sm-5">Nom Usuari: </label>
                            <label id="cu46_nomUsuari" class="col-sm-7"></label>
                        </div>
                        <div>
                            <label class="col-sm-5">Grups: </label>
                            <div id="cu46_grupstotals" class="col-sm-7"></div>
                        </div>
                    </div>

                    <div class="text-right darkColor">
                        <button id="buttonModPerGrups" class="btn btn-primary" type="submit">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



