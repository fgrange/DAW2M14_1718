@extends('layouts.master')

@section('content')
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#pujarVersio">Open Modal</button>

<div class="modal fade" id="pujarVersio" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div>
                    <h3 class="panel-title text-center">
                        <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                        Pujar Versió
                    </h3>
                </div>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <input hidden name="id" value="{{$document->idDocument}}">
                    <!-- <input hidden name="versioOld" value="{{$document->versioInterna}}"> -->

                    <div class="form-group">
                        <label for="title">Nom del arxiu</label>
                        <input type="text" name="nom" id="nom" class="form-control" required value="{{$document->nom}}">
                    </div>

                    <div class="form-group">
                            <label for="title">Ruta de l'arxiu</label>
                            <input type="file" name="arxiu" id="arxiu" class="form-control" required>
                    </div>

                    <div class="form-group">
                            <label for="synopsis">Descripció (Opcional)</label>
                    <textarea name="desc" id="desc" class="form-control" rows="3" value="{{$document->descripcio}}"></textarea>
                    </div>

                    <div class="form-group">
                            <label for="synopsis">Versió</label>
                            <input pattern="^[0-9]*(\.[0-9]+)*$" type="text" name="ver" id="ver" class="form-control">
                    </div>

                    <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">
                                    Pujar arxiu 
                            </button>
                    </div> 
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
     </div>
</div>

<div class="row" style="margin-top:20px" hidden>

	<div class="col-md-offset-3 col-md-6">

		<div class="panel panel-default">
			<div>
                            <h3 class="panel-title text-center">
                                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                                Pujar Versió
                            </h3>
			</div>
			<div class="panel-body" style="padding:30px">
                            <form method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <input hidden name="id" value="{{$document->idDocument}}">
                                <!-- <input hidden name="versioOld" value="{{$document->versioInterna}}"> -->

                                <div class="form-group">
                                    <label for="title">Nom del arxiu</label>
                                    <input type="text" name="nom" id="nom" class="form-control" required value="{{$document->nom}}">
                                </div>

                                <div class="form-group">
                                        <label for="title">Ruta de l'arxiu</label>
                                        <input type="file" name="arxiu" id="arxiu" class="form-control" required>
                                </div>

                                <div class="form-group">
                                        <label for="synopsis">Descripció (Opcional)</label>
                                <textarea name="desc" id="desc" class="form-control" rows="3" value="{{$document->descripcio}}"></textarea>
                                </div>

                                <div class="form-group">
                                        <label for="synopsis">Versió</label>
                                        <input pattern="^[0-9]*(\.[0-9]+)*$" type="text" name="ver" id="ver" class="form-control">
                                </div>

                                <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                                Pujar arxiu 
                                        </button>
                                </div> 
                            </form>
			</div>
		</div>
	</div>
</div>
@stop