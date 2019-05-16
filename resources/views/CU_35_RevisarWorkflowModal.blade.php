<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalRevisar" data-id="{{ $id }}">Revisar</button>

<div class="modal fade" id="modalRevisar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Revisar workflow</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="{{ url('/CU_35_RevisarWorkflow/'.$id) }}">
					{{ csrf_field() }}

					<div class="form-group">
						<h4>Estàs segur d'acceptar el document?</h4>
						<h6>id: {{$id}}</h6>
					</div>
			</div>

			<div class="modal-footer">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Acceptar document
					</button>
          <form method="POST" action="{{ url('/CU_35_RebutjarRevisarWorkflow/'.$id) }}">
  					{{ csrf_field() }}
            <button type="submit" class="btn btn-danger">
  						Rebutjar document
  					</button>
          </form>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
