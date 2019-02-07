@extends('layouts.master')
@section('content')
<div class="container">
<h2>Mostrar Plantilla Workflow</h2>
<div class="table-responsive">
  <table class="table table-hover">
            <thead>
                <tr> 
                    <th>ID Plantilla</th>
                    <th>Nom Plantilla</th>
                    <th>UsuariCreador</th>
                    <th>UsuariAprovador</th> 
                    <th colspan="4">UsuariRevisor </th>
                    <th colspan="4"></th>
                </tr>
            </thead>
            <tbody>
                
                
                @foreach($plantilla as $plantillas)
                    <tr>
                        <td>{{ $plantillas->idPlantilla }}</td>
                        <td>{{ $plantillas->nomPlantilla }}</td>
                        
                        
                        @foreach($users as $user)
                        @if ($plantillas->idUsuariCreador == $user->idUsuari)
                        <?php $usuCreador =  $user->nomUsuari; ?>
                        <td>{{ $user->nomUsuari }}</td>
                        @endif
                        @endforeach
                        
                        @foreach($users as $user)
                        @if ($plantillas->idUsuariAprovador == $user->idUsuari)
                        <?php $UsuariAprovador =  $user->nomUsuari; ?>
                        <td>{{ $user->nomUsuari }}</td>
                        @endif
                        @endforeach
                        
                        @foreach($plantillarevisors as $revi)
                        
                        @foreach($users as $user)
                        @if ($plantillas->idPlantilla == $revi->idPlantilla)
                            @if($revi->idUsuariRevisor==$user->idUsuari)
                            
                        <td >{{ $user->nomUsuari }}</td>
                        @endif
                        @endif
                        @endforeach
                        @endforeach
                        
                        <td></td>
                        <td colspan="4" style="text-align: right">
            @include('CU_27_EditarPlantilla_modal', ['id' => $plantillas->idPlantilla, 'userAprov' => $users, 'usersRev' => $plantillarevisors,
            'nomPlantilla' => $plantillas->nomPlantilla, 'UsuCreador' => $usuCreador, 'UsuariAprovador' => $UsuariAprovador ])
            <!--
            MODIFICIACIÓN SIN MODAL
            <a href="{{url('/CU_27_EditarPlantilla/'.$plantillas->idPlantilla)}}" class="btn btn-warning btn-lg active" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
            -->
            @include('CU_28_EliminarPlantilla', ['id' => $plantillas->idPlantilla, 'userAprov' => $users, 'usersRev' => $plantillarevisors,
            'nomPlantilla' => $plantillas->nomPlantilla, 'UsuCreador' => $usuCreador, 'UsuariAprovador' => $UsuariAprovador ])
          <!--  <a href="{{url('/CU_28_EliminarPlantilla/' .$plantillas->idPlantilla )}}" class="btn btn-danger btn-lg active" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
          -->
            </td>
                    </tr>
                @endforeach
               
            </tbody>

        </table>
</div>
@include('CU_26')
</div>
@stop