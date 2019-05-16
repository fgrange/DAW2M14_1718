<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAprovar" data-id="{{ $id }}">Aprovar</button>

<div class="modal fade" id="modalAprovar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Aprovar workflow</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="{{ url('/CU_35_AprovarWorkflow'.$id) }}">
					{{ csrf_field() }}

					<div class="form-group">
						<h4>Estàs segur d'aprovar el document?</h4>
						<h6>{{$id}}</h6>
					</div>
			</div>

			<div class="modal-footer">
				<div class="form-group">
					<button type="submit" class="btn btn-success">
						Aprovar document
					</button>
          <form method="POST" action="{{ url('/CU_35_RebutjarAprovarWorkflow'.$id) }}">
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
