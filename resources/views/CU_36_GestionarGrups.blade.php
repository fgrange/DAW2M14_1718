@extends('layouts.master')
@section('content')
<?php echo "<script>document.title = 'Gestionar Grups';</script>"; ?>

<div>{!! Notification::showAll() !!}</div>

<div class="container" style="width: 100%;">
    <div class="row">
        <div class="form-group">
            <table style="text-align: center; background: #455A64; color: white;" class="table table-condensed table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;">Gestionar grups</th> 
                    </tr>
                </thead>
            </table>

        </div>
        @include('CU_40_CrearGrup')
        @include('CU_41_MostrarGrups')
    </div>
</div>
@stop