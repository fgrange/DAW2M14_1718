<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalRevisar<?php echo $idW; ?>" data-id="{{ $idW }}">Revisar</button>

{{-- modal revisar --}}
<div class="modal fade" id="modalRevisar<?php echo $idW; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Revisar workflow</h4>
			</div>

			<div class="modal-body">
				<form method="POST" action="{{ url('/CU_35_RevisarWorkflow/') }}">
					{{ csrf_field() }}
					<input type="hidden" name="idWorkflow" id="id" value="{{$idW}}">
					<input type="hidden" name="idRevisor" id="id" value="{{$idR}}">
					<div class="form-group">
						<h4>Estàs segur d'acceptar el document?</h4>
					</div>
			</div>

			<div class="modal-footer">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Acceptar document
					</button>
          <form method="POST" action="{{ url('/CU_35_RebutjarRevisarWorkflow') }}">
  					{{ csrf_field() }}
						<input type="hidden" name="idWorkflow" id="id" value="{{$idW}}">
						<input type="hidden" name="idRevisor" id="id" value="{{$idR}}">
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
