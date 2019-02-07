

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#edit<?php echo $id; ?>" data-id="{{ $id }}">
	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            <?php $id_elemento =  $id; ?>
</button>
<div class="modal fade" id="edit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Editar Plantilla Workflow</h4>
			</div>
			<div class="modal-body">
				<div class="container">
  
                                   
 <div class="panel-body" style="padding:30px">
                {{-- TODO: Abrir el formulario e indicar el método POST --}}
                <form method="POST" action="{{url('/CU_27_EditarPlantilla/'.$id  )}}">

                    {{-- TODO: Protección contra CSRF --}}

                    {{ csrf_field() }}
                    
                    
                    
                       <div class="form-group">
                        <label for="title">Nombre</label> 
                        <input type="text" name="nomPlantilla" id="nomPlantilla" value="{{ $nomPlantilla }}">
                    </div>
<label for="Aprovador">Aprovador Actual</label>
                    <div class="form-group">
                        
                       
                         @foreach($userAprov as $user)
                        @if ($plantillas->idUsuariAprovador == $user->idUsuari)
                        <input type="text" readonly="readonly" name="aprov" id="aprov" value="{{ $UsuariAprovador }}"><br>
                        
                        <label for="re">Aprovador</label>
                        @endif
                        @endforeach
                            
                        <select class="selectpicker btn-lg" name="aprov">
                             @foreach($userAprov as $user)
                              {{ $user->idUsuari }} 
                               
                            <option value="{{ $user->idUsuari }}" <?php if($UsuariAprovador == $user->nomUsuari ) echo "selected" ?>> {{ $user->nomUsuari }}</option>
                            @endforeach  
                        </select>
                        
                    </div>
<label for="Aprovador">Revisor/es Actual</label>

               <div class="form-group">          
                        <?php $revidoresActuales[] = array()?>
                       @foreach($usersRev as $revi) 
                        @foreach($userAprov as $user)
                        @if ($plantillas->idPlantilla == $revi->idPlantilla)
                            @if($revi->idUsuariRevisor == $user->idUsuari)
                            <?php  array_push($revidoresActuales, $user->nomUsuari )?>
                            <input type="text" readonly="readonly" id="revi" name="revi4[]" value="{{ $user->nomUsuari }}">
                        @endif
                        @endif
                        @endforeach           
                        @endforeach
                    <br><label for="re">Revisor/es</label>
                        <select class="selectpicker btn-lg" multiple size="3" name="revi[]">
                            @foreach($userAprov as $user)
                               
                                <option value="{{ $user->idUsuari }}" <?php if( in_array($user->nomUsuari, $revidoresActuales ) ) echo "selected" ?>>{{ $user->nomUsuari}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                            Guardar Plantilla
                        </button>
                    </div>
                    {{-- TODO: Cerrar formulario --}}
                </form>

            </div>
</div>


			</div>
		</div>
	</div>
</div>

