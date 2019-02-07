

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#miModal">
	Crear Plantilla Workflow
</button>
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Crear Plantilla</h4>
			</div>
			<div class="modal-body">
				<div class="container">
  
                                   
 <div class="panel-body" style="padding:30px">
                {{-- TODO: Abrir el formulario e indicar el método POST --}}
                <form method="POST" action="{{ url('/newPlantilla') }}">

                    
                    {{-- TODO: Protección contra CSRF --}}

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="title">Nombre</label>
                        <input type="text" name="nomPlantilla" id="nom">
                    </div>

                    <div class="form-group">
                        {{-- TODO: Completa el input para el año --}}
                        <label for="Aprovador">Aprovador/es</label>
                        <select class="selectpicker btn-lg" name="aprov">
                            @foreach($users as $user)
                               
                            <option value="{{ $user->idUsuari }}"> {{ $user->nomUsuari }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {{-- TODO: Completa el input para el año --}}
                        <label for="año">Revisor</label>
                        
                        <select class="selectpicker btn-lg" multiple size="3" name="revi[]">
                            @foreach($users as $user)
                               
                                <option value="{{ $user->idUsuari }}">{{ $user->nomUsuari }}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary " style="padding:8px 100px;margin-top:25px;">
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

