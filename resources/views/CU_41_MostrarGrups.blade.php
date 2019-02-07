<table style="text-align: center;" class="table table-condensed table-striped table-bordered">
    <thead>
        <tr>
            <th style="text-align: center;">Nom</th>
            <th style="text-align: center;">Membres</th>
            <th style="text-align: center;">Opcions</th>  
        </tr>
    </thead>
    <tbody>
        <!--Recorre grupos y creamos una fila por cada grupo-->
        @foreach( $grups as $grup )
        <tr>
            <!--columna con nombre grupo-->
            <td id="nombreGrupo" value="{{ $grup->nom }}">{{ $grup->nom }}
                
                <!--Creamos 1 campo oculto para nombre e id de grupo para obtenerlos al eliminar o modificar ese grupo-->
                <input type="hidden" name="idGrup" id="idGrup" value="{{ $grup->idGrup }}">
                <input type="hidden" name="nomGrup" id="nomGrup" value="{{ $grup->nom }}">
            
            </td>
            <td id="nombreMiembros">
                <!--Recorre usuarios grupo-->
                @foreach( $usuariGrups as $usuariGrup )
                
                <!--Recorre usuarios-->
                @foreach( $usuaris as $usuari )
                
                <!--Si id de grupo es igual a id de ese usuario de grupo entra-->
                @if( $grup->idGrup === $usuariGrup->idGrup )
                
                <!--Si id de usuario es igual a ese id de usuario grupo entra y añade usuario-->
                @if( $usuari->idUsuari === $usuariGrup->idUsuari )
                {{ $usuari->nomUsuari }}
                
                <!--Creamos 1 campo oculto para nombre e id de usuario para obtenerlos al presionar modificar 
                este grupo para añadirlos a la columna usuaris del grup-->
                <input type="hidden" name="idUsuariGrup" id="idUsuariGrup" value="{{ $usuari->idUsuari }}">
                <input type="hidden" name="nomUsuariGrup" id="nomUsuariGrup" value="{{ $usuari->nomUsuari }}">
                @endif
                @endif
                @endforeach

                @endforeach
            </td>
            <td>
                
                @include('CU_38_ModificarGrup')
                @include('CU_37_EliminarGrup')
                <a class="glyphicon glyphicon-circle-arrow-right" href=""></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>