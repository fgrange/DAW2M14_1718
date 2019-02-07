
@extends('layouts.master')

@section('content')
<div class="container" style="padding: 30px;">
    <div class="row">
        <div class="form-group">
            <table style="text-align: center; background: #455A64; color: white;" class="table table-condensed table-striped table-bordered">
                <thead>
                <tr>
                    <th style="text-align: center;">Mostrar Usuaris</th> 
                </tr>
                </thead>
            </table>
              
        </div>
       
        <!-- SOLO DEBERIA INCLUIR LA TABLA, el resto es el CU_42 -->
        
        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de Usuari</th>
                    <th>Nom</th>
                    <th>Cognoms</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->idUsuari }}</td>
                        <td>{{ $user->nomUsuari }}</td>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->cognoms }}</td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        
        <!--                                      -->
        
        
        
        
        
        
    </div>
</div>
@stop
