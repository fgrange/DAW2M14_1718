<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">
	Crear plantilla workflow
</button>

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Crear plantilla</h4>
			</div>
			<div class="modal-body">
				<div class="container">

					<div class="panel-body" style="padding:30px">
						<form method="POST" action="{{ url('/newPlantilla') }}">
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
