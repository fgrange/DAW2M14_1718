@extends('layouts.master')

@section('content')

@include('CU_52_CrearUsuari')
@include('CU_45_ModificarUsuari')
@include('CU_43_EliminarUsuari')
@include('CU_47_AltaUsuari')
@include('CU_44_BaixaUsuari')
@include('CU_46_ModificarPertinencaGrups')


<!-- Bootstrap and my style-->
<link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ url('/css/CU_42_GestionarUsuaris.css') }}" rel="stylesheet">

<div>{!! Notification::showAll() !!}</div>

<div id="containerUsuarios">
    <div class="rowTitulo">
        <label class="col-md-4">Nom i cognoms</label>
        <label class="col-md-3">Nom usuari</label>
        <label class="col-md-5">Accions</label>
    </div>

    @foreach( $users as $usuari )
    <div class="rowRegistro">
        <label class="col-md-4">{{ $usuari->nom }} {{ $usuari->cognoms }}</label>
        <label class="col-md-3">{{ $usuari->nomUsuari }}</label>
        <div class="col-md-5 divAccions">
            <button name="modalButtonEdit" class="btn btn-warning" value="{{$usuari->idUsuari}}"><span class="glyphicon glyphicon-pencil"></span> Editar </button>
            @if ($usuari->estat == 0)
            <button name="modalButtonAlta" class="btn btn-success botoAltaBaixa" value="{{$usuari->idUsuari}}"><span class="glyphicon glyphicon-arrow-up"></span> Alta </button>
            @elseif($usuari->estat == 1)
            <button name="modalButtonBaixa" class="btn btn-info botoAltaBaixa" value="{{$usuari->idUsuari}}"><span class="glyphicon glyphicon-arrow-down"></span> Baixa </button>
            @endif
            <button name="modalButtonDelete" class="btn btn-danger" value="{{$usuari->idUsuari}}"><span class="glyphicon glyphicon-trash"></span> Eliminar </button>
        </div>
    </div>
    @endforeach

    <div class="divBotoCrear">
        <button id="modalButtonNew" class="btn btn-primary botoAltaBaixa"><span class="glyphicon glyphicon-plus-sign"></span> Crear nou usuari </button>
    </div>
</div>



<script src="{{ url('/js/jquery.min.js') }}"></script>
<script src="{{ url('/js/bootstrap.min.js') }}"></script>
<script>
var urlNew = "http://localhost/DAW2M14/public/CU_52_CrearUsuari";
var urlEdit = "http://localhost/DAW2M14/public/CU_45_ModificarUsuari?id=";
var urlDelete = "http://localhost/DAW2M14/public/CU_43_EliminarUsuari?id=";
var urlAlta = "http://localhost/DAW2M14/public/CU_47_AltaUsuari?id=";
var urlBaixa = "http://localhost/DAW2M14/public/CU_44_BaixaUsuari?id=";
var urlModPerGrups = "http://localhost/DAW2M14/public/CU_46_ModificarPertinencaGrups?id=";
var iduser;
var mostrar;


$("button[name='modalButtonDelete']").click(function() {
    iduser = this.value;
    $.get(urlDelete + iduser)
            .done(function(data) {
                $('#cu43_idUsuari').val(data[0][0].idUsuari);
                $('#cu43_nomUsuari').val(data[0][0].nomUsuari);
                $('#cu43_contrasenya').val(data[0][0].contrasenya);
                $('#cu43_nom').val(data[0][0].nom);
                $('#cu43_cognoms').val(data[0][0].cognoms);
                $('#cu43_email').val(data[0][0].email);
                $('#cu43_dadesPostals').val(data[0][0].dadesPostals);
                $('#cu43_tipus').val(data[0][0].tipus);
                var radioButton = data[0][0].estat;
                if (radioButton == 0) {
                    $("#cu43_estat0").prop("checked", true);
                    $('#cu43_estat1').prop('checked', false);
                } else {
                    $('#cu43_estat1').prop('checked', true);
                    $('#cu43_estat0').prop('checked', false);
                }

                var nomgrups = "<div>";
                for (i = 0; i < data[1].length; i++) {
                    nomgrups = nomgrups + data[1][i].nom + "</div>";
                }
                $('#cu43_grup').html(nomgrups);
                $('#modalButtonDelete').modal('toggle');
                $('#miModalDelete').modal('show');
            })
            .fail(function() {
                alert('Error.....');
            })
            .always(function() {
                //alert('Fi');
            });
});

$('#modalButtonNew').click(function() {
    $.get(urlNew)
            .done(function(data) {
                //$('#cu52_idUsuari').val(data[0][0].idUsuari);
                $('#modalButtonNew').modal('toggle');
                $('#miModalNew').modal('show');
            })
            .fail(function() {
                alert('Error.....');
            })
            .always(function() {
                //alert('Fi');
            });
});

$("button[name='modalButtonAlta']").click(function() {
    iduser = this.value;
    $.get(urlAlta + iduser)
            .done(function(data) {
                $('#cu47_idUsuari').val(data[0][0].idUsuari);
                $('#cu47_nomUsuari').html(data[0][0].nomUsuari);
                $('#cu47_contrasenya').html(data[0][0].contrasenya);
                $('#cu47_nom').html(data[0][0].nom);
                $('#cu47_cognoms').html(data[0][0].cognoms);
                $('#cu47_email').html(data[0][0].email);
                $('#cu47_dadesPostals').html(data[0][0].dadesPostals);
                $('#cu47_tipus').html(data[0][0].tipus);
                var nomgrups = "<div>";
                for (i = 0; i < data[1].length; i++) {
                    nomgrups = nomgrups + data[1][i].nom + "</div>";
                }
                $('#cu47_grups').html(nomgrups);
                $('#modalButtonAlta').modal('toggle');
                $('#miModalAlta').modal('show');
            })
            .fail(function() {
                alert('Error.....');
            })
            .always(function() {
                //alert('Fi');
            });
});

$("button[name='modalButtonBaixa']").click(function() {
    iduser = this.value;
    $.get(urlBaixa + iduser)
            .done(function(data) {
                $('#cu44_idUsuari').val(data[0][0].idUsuari);
                $('#cu44_nomUsuari').html(data[0][0].nomUsuari);
                $('#cu44_contrasenya').html(data[0][0].contrasenya);
                $('#cu44_nom').html(data[0][0].nom);
                $('#cu44_cognoms').html(data[0][0].cognoms);
                $('#cu44_email').html(data[0][0].email);
                $('#cu44_dadesPostals').html(data[0][0].dadesPostals);
                $('#cu44_tipus').html(data[0][0].tipus);
                var nomgrups = "<div>";
                for (i = 0; i < data[1].length; i++) {
                    nomgrups = nomgrups + data[1][i].nom + "</div>";
                }
                $('#cu44_grups').html(nomgrups);
                $('#modalButtonBaixa').modal('toggle');
                $('#miModalBaixa').modal('show');
            })
            .fail(function() {
                alert('Error.....');
            })
            .always(function() {
                //alert('Fi');
            });
});

$(document).on("click", "button[name='modalButtonEdit']", function() {
    iduser = this.value;
    $.get(urlEdit + iduser)
            .done(function(data) {
                editModal(data);
            })
            .fail(function() {
                alert('Error.....');
            })
            .always(function() {
                //alert('Fi');
            });
});

function editModal(data) {
    $('#cu45_idUsuari').val(data[0][0].idUsuari);
    $('#cu45_nomUsuari').val(data[0][0].nomUsuari);
    $('#cu45_contrasenya').val(data[0][0].contrasenya);
    $('#cu45_nom').val(data[0][0].nom);
    $('#cu45_cognoms').val(data[0][0].cognoms);
    $('#cu45_email').val(data[0][0].email);
    $('#cu45_dadesPostals').val(data[0][0].dadesPostals);
    $('#cu45_tipus').val(data[0][0].tipus);
    var radioButton = data[0][0].estat;
    if (radioButton == 0) {
        $("#cu45_estat0").prop('checked', true);
        $('#cu45_estat1').prop('checked', false);
    } else {
        $('#cu45_estat1').prop('checked', true);
        $('#cu45_estat0').prop('checked', false);
    }

    var nomgrups = "<div>";
    for (i = 0; i < data[1].length; i++) {
        nomgrups = nomgrups + data[1][i].nom + "</div>";
    }
    $('#cu45_grup').html(nomgrups);
    $('#modalModificarGrups').attr("value", iduser);
    $('#buttonModPerGrups').attr("value", iduser);

    mostrar = false;

    $('#modalButtonEdit').modal('toggle');
    $('#miModalEdit').modal('show');
}
;

$(document).on("click", "#modalModificarGrups", function() {
    iduser = this.value;
    $.get(urlModPerGrups + iduser)
            .done(function(data) {
                $('#cu46_idUsuari').val(data[0][0].idUsuari);
                $('#cu46_nomUsuari').html(data[0][0].nomUsuari);
                var check = '<input type="checkbox" name="checkGrups[]" value=';
                var grups = '';
                var idgrup;
                for (n = 0; n < data[2].length; n++) {
                    idgrup = data[2][n].idGrup;
                    grups = grups + check + idgrup + ' id="cu46_idgrup' + idgrup + '" />' + data[2][n].nom + '</br>';
                }
                $('#cu46_grupstotals').html(grups);
                for (n = 0; n < data[2].length; n++) {
                    idgrup = data[2][n].idGrup;
                    for (i = 0; i < data[1].length; i++) {
                        if (data[1][i].idGrup == idgrup) {
                            $('#cu46_idgrup' + idgrup).prop("checked", true);
                        }
                    }
                }

                $('#modalModificarGrups').modal('toggle');
                $('#miModalModPerGrups').modal('show');
            })
            .fail(function() {
                alert('Error.....');
            })
            .always(function() {
                //alert('Fi');
            });
});

$(document).on("click", "#buttonModPerGrups", function() {
//falta que es refresqui la informació de la modal CU_45 i faci show
    iduser = this.value;
    mostrar = true;
    return mostrar;
});

$(document).ready(function() {
    /*if (!mostrar) {
     alert("muestra modal edit");
     $("button[name='modalButtonEdit']").click();
     }*/
});

</script>
@endsection

