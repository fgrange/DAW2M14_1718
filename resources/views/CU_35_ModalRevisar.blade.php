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
					<div class="form-group">
						<label for="notes" class="control-label">Notes:</label>
						<textarea class="form-control" name="notesRevisor" id="notesRev" rows="8" ></textarea>
					</div>
			</div>

			<div class="modal-footer">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						Acceptar document
					</button>
				</div>
			</div>
			</form>
			<form method="POST" action="{{ url('/CU_35_RebutjarRevisarWorkflow') }}"
				style="position: absolute;
							 bottom: 14px;
							 left: 15px">
				{{ csrf_field() }}
				<input type="hidden" name="idWorkflow" value="{{$idW}}">
				<input type="hidden" name="idRevisor" value="{{$idR}}">
				<input type="hidden" name="notesRevisor" id="nRevi" value="">
				<button class="btn btn-danger" id="rebutjarButton">
					Rebutjar document
				</button>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
			$("#rebutjarButton").click(function(){
					$('#nRevi').val($.trim($("#notesRev").val()));
			});
	});
</script>
