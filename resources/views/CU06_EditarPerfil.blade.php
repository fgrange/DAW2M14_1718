@extends('layouts.master')

@section('content')

<div class="container">
    <h2>Mi perfil</h2>
<form action="editarPerfil/edit" method="POST">
    {{csrf_field()}}

    <div class="form-group">
      <label for="nomUsuari">Nom usuari:</label>
      <input type="text" class="form-control" name="nomUsuari" id="nomUsuari" value="{{$usuari->nomUsuari}}">
    </div>
    <div class="form-group">
      <label for="contrasenya">Nova contrasenya:</label>
      <input type="password" class="form-control" name="contrasenya" id="contrasenya" placeholder="(Opcional)">
    </div>
    <div class="form-group">
      <label for="cognoms">Nom:</label>
      <input type="text" class="form-control" name="nom" id="nom" value="{{$usuari->nom}}">
    </div>
    <div class="form-group">
      <label for="cognoms">Cognoms:</label>
      <input type="text" class="form-control" name="cognoms" id="cognoms" value="{{$usuari->cognoms}}">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" value="{{$usuari->email}}">
    </div>
    <div class="form-group">
      <label for="dadesPostals">Dades postals:</label>
      <input type="text" class="form-control" name="dadesPostals" id="dadesPostals" value="{{$usuari->dadesPostals}}">
    </div>
    <button type="submit" class="btn btn-success">Modifica</button>
    <a href="{{url('/abrirCarpeta/personal')}}" class="btn btn-danger">Cancel·la</a>
  </form>
</div>
@stop