@extends('layouts.master')

@section('content')
@notification()
        <table class="table" style="margin-bottom: 5rem;">
            <tr>
                <td class="col-md-6" style="border-top:none;">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearCarpetaModal" data-book-id="{{$title}}"><span class="glyphicon glyphicon-plus"></span><p style="display:inline; margin-left: 5px;">Crear Carpeta</p></button></td>
                <td class="col-md-6" style="border-top:none;">
                    <button type="button" class="btn btn-primary"
                            data-toggle="modal" data-target="#modalPujarArxiu">
                        <span class="glyphicon glyphicon-circle-arrow-up"></span>
                        <p style="display:inline; margin-left: 5px">
                            Pujar Document
                        </p>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="col-md-6" style="border-top:none;">
                    <select class="form-control">
                        <option>Acció en masa</option>
                    </select>
                </td>
                <td class="col-md-6" style="border-top:none;">
                    <select class="form-control">
                        <option>Ordena per</option>
                    </select>
                </td>
            </tr>
        </table>


        <table class="table tabla-carpetas">
          <tr>
            <th class="col-md-6">Item</th>
            <th class="col-md-3 centered">Data modificació</th>
            <th class="col-md-3 centered">Opcions</th>
          </tr>
            @foreach( $carpetes as $key => $carpeta)
            <tr class="tabla-carpetas-body">

                <td class="col-md-6"><a href="{{url('/abrirCarpeta/'.$carpeta->idCarpeta)}}"><i class="far fa-folder" style="margin-right: 2rem"></i><b>{{$carpeta->nom}}</b></a></td>
                <td class="col-md-3 centered" style="vertical-align: middle"><br>{{{ isset($carpeta->dataModificacio) ? $carpeta->dataModificacio : $carpeta->dataCreacio}}}</td>

                <td class="col-md-3 centered">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#descargarModal" data-book-id="{{$carpeta->idCarpeta}}" data-book-nombre="{{$carpeta->nom}}" data-book-path="{{$carpeta->path}}"><span class="glyphicon glyphicon-cloud-download"></button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gestionarPermisosModal" data-book-id="{{$carpeta->idCarpeta}}" data-book-nombre="{{$carpeta->nom}}"><span class="glyphicon glyphicon-lock"></button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modificarModal" data-book-id="{{$carpeta->idCarpeta." carpeta"}}" data-book-ultimamod="{{$carpeta->dataModificacio}}" data-book-nombre="{{$carpeta->nom}}" data-book-descripcion="{{$carpeta->descripcio}}" data-book-idUsuari="{{$carpeta->idUsuari}}"><span class="glyphicon glyphicon-wrench"></button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#moureCarpetaModal" data-book-id="{{$carpeta->idCarpeta}}" data-book-name="{{$totesCarpetes}}"><span class="glyphicon glyphicon-new-window"></button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#borrarModal" data-book-id="{{$carpeta->idCarpeta." carpeta"}}" data-book-name="{{$carpeta->nom}}"><span class="glyphicon glyphicon-trash"></button>
                </td>
            </tr>
            @endforeach
            @foreach( $arxius as $key => $document)
            <tr>

                <td class="col-md-6"><i class="far fa-file" style="margin-right: 2rem"></i><b>{{$document->nom}}</b></a></td>
                <td class="col-md-3 centered" style="vertical-align: middle"><br>{{{ isset($document->dataModificacio) ? $document->dataModificacio : $document->dataCreacio}}}</a></td>

                <td class="col-md-3 centered">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generaURLModal" data-book-id="{{$document->idDocument}}" data-book-idversio="{{$document->versioInterna}}" data-book-path="{{$document->path}}"><span class="glyphicon glyphicon-link"></button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#generaPDF" data-book-id="{{$document->idDocument}}" data-book-nombre="{{$document->nom}}" data-book-path="{{$document->path}}" data-book-formato="{{$document->formatDocument}}"><span class="glyphicon glyphicon-cloud-download"></button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pujarVersioModal" data-book-id="{{$document->idDocument}}"><span class="glyphicon glyphicon-paperclip"></span></button>
                  <a href="{{url('veureVersions/'.$document->idDocument)}}"><button type="button" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-list-alt"></span></button></a>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#moureDocumentModal" data-book-id="{{$document->idDocument}}" data-book-name="{{$totesCarpetes}}"><span class="glyphicon glyphicon-new-window"></button>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#borrarModal" data-book-id="{{$document->idDocument." documento"}}" data-book-name="{{$document->nom}}"><span class="glyphicon glyphicon-trash"></button>

                </td>
            </tr>
            @endforeach
        </table>
        <div>
        <button type="button" id="enrere" class="btn btn-primary">
            <span class="glyphicon glyphicon-level-up"></span>
            <p style="display:inline; margin-left: 5px">Enrere</p>
        </button>
        </div>

        <!-- Modal Descargar ZIP-->
        <div class="modal fade" id="descargarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Descargar</h4>
              </div>
              <div class="modal-body">
                  ¿Esta seguro que desea descargar la carpeta <b><p id="bookId" style="display: inline-block"></p></b>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form id="modalFormDescargarzip" action="" method="POST" style="display:inline">
                {{ csrf_field() }}
                <button type="submit" id="downloadzip" class="btn btn-primary btn-success">Descargar ZIP</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Descargar PDF-->
        <div class="modal fade" id="generaPDF" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Descargar</h4>
              </div>
              <div class="modal-body">
                  ¿Esta seguro que desea descargar un PDF del archivo?<b><p id="bookId" style="display: inline-block"></p></b>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form id="modalFormDescargarpdf" action="" method="POST" style="display:inline">
                {{ csrf_field() }}
                <button type="submit" id="downloadpdf" class="btn btn-primary btn-success">Descargar PDF</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Eliminar-->
        <div class="modal fade" id="borrarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Eliminar</h4>
              </div>
              <div class="modal-body">
                  Seguro que desea eliminar <b><p id="bookId" style="display: inline-block"></p></b>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form id="modalFormElim" action="" method="POST" style="display:inline">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary btn-danger">Eliminar</button>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal Crear-->
        <form id="modalFormCrear" action="" method="POST" style="display:inline">
            <div class="modal fade" id="crearCarpetaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Crear Carpeta</h4>
                  </div>
                  <div class="modal-body">
                      <h4>Nom:<h4><input type="text" name="nomCarpeta" id="nomCarpeta" maxlength="15" class="form-control" required>
                      <h4>Descripció:<h4><textarea name="descripcioCarpeta" id="descripcioCarpeta" rows="8" maxlength="200" class="form-control"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary btn-success">Crear</button>

                  </div>
                </div>
              </div>
            </div>
        </form>

        <!-- Modal Modificar-->
        <form id="modalFormModificar" action="" method="POST" style="display:inline">
            <div class="modal fade" id="modificarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Modificar Carpeta</h4>
                  </div>
                  <div class="modal-body">
                      <b>Nombre: </b></br>
                      <input id="nombreInput" name="nombreInput" maxlength="15" type="text" class="form-control"> </br>
                      <b>Descripció: </b></br>
                      <textarea id="descripcionInput" name="descripcioInput" maxlength="200" class="form-control" rows="4"></textarea></br>
                      <b>Propietari: </b></br>
                      <p id="propietari">Ningú</p>
                      <b>Modificat per: </b></br>
                      <p id="idUsuari" name="idUsuari">{{$_SESSION['nomUsuari']}}</p>
                      <b>Ultima modificacio: </b></br>
                      <p id="ultimaModificacio">No s'ha modificat</p>
                  </div>
                  <div class="modal-footer" style="text-align: center">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary btn-success">Guardar</button>
                  </div>
                </div>
              </div>
            </div>
        </form>

        <!-- Modal Moure-->
        <form id="modalFormMoure" action="" method="POST" style="display:inline">
            <div class="modal fade" id="moureCarpetaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Moure Carpeta</h4>
                  </div>
                  <div class="modal-body">
                      <h4>Carpetes:</h4>
                      <div id="listaCarpeta"></div>
                      <b>Nom de la carpeta destinatari: </b><input id="nombreMovCarpeta" name="nombreMovCarpeta" type="text" class="form-control" disabled >
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary btn-info">Mover</button>

                  </div>
                </div>
              </div>
            </div>
        </form>

        <form id="modalFormMoureDocument" action="" method="POST" style="display:inline">
            <div class="modal fade" id="moureDocumentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Moure Document</h4>
                  </div>
                  <div class="modal-body">
                      <h4>Carpetes:</h4>
                      <div id="listaCarpetaD"></div>
                      <b>Nom de la carpeta destinatari: </b><input id="nombreMovDocumento" name="nombreMovDocumento" type="text" class="form-control" disabled >
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary btn-info">Mover</button>

                  </div>
                </div>
              </div>
            </div>
        </form>

        <!-- Modal Gestionar Permisos-->
        <div class="modal fade" id="gestionarPermisosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document" style="width:730px;">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Permisos de la carpeta <b><p id="carpetaPermisosTexto" style="display: inline-block"></p></b></h3>
              </div>
              <div class="modal-body">
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#cu">Cambiar usuari </a></li>
                      <li><a data-toggle="tab" href="#au">Afegir Usuari</a></li>
                      <li><a data-toggle="tab" href="#bu">Borrar usuari</a></li>
                      <li><a data-toggle="tab" href="#cg">Cambiar grup </a></li>
                      <li><a data-toggle="tab" href="#ag">Afegir grup</a></li>
                      <li><a data-toggle="tab" href="#bg">Borrar grup</a></li>
                    </ul>

                    <div class="tab-content">
                      <div id="cu" class="tab-pane fade in active">
                        <h3>Cambiar permís d'un usuari</h3>
                        <form id="formcambiarPermisUsuari" action="" method="POST" style="display:inline">
                            <div class="form-group">
                          <label>Usuaris: </label>
                          <select class="form-control" id="listaUsuariosCambiar" name="listaUsuariosCambiar" style="min-width:120px;"></select>
                        </div>
                        <div id="cambiarPermisCheckboxs" class="form-group">
                          <label>Selecciona un permís: </label>
                          <input id="cambiarPermisUsuaris" class="form-check-input" type="radio" name="permisosUsuarios" value="s"> Super
                          <input id="cambiarPermisUsuariw" class="form-check-input" type="radio" name="permisosUsuarios" value="w"> Escritura
                          <input id="cambiarPermisUsuarir" class="form-check-input" type="radio" name="permisosUsuarios" value="r"> Lectura
                          <input id="cambiarPermisUsuari-" class="form-check-input" type="radio" name="permisosUsuarios" value="-"> Cap permís
                        </div>
                        <div style="text-align: right">

                            {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary btn-success">Cambiar</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                      </div>
                      <div id="au" class="tab-pane fade">
                        <h3>Afegir nou usuari</h3>
                        <form id="formafegirPermisUsuari" action="" method="POST" style="display:inline">
                        <div class="form-group">
                            <label>Afegir permís Usuari: </label>
                            <select class="form-control" id="listaUsuariosAgregar" name="listaUsuariosAgregar" style="min-width:120px;"></select>
                        </div>
                            <div class="form-group">
                                <label>Selecciona un permís: </label>
                                <input class="form-check-input" type="radio" name="permisosUsuarios" value="s"> Super
                                <input class="form-check-input" type="radio" name="permisosUsuarios" value="w"> Escritura
                                <input class="form-check-input" type="radio" name="permisosUsuarios" value="r"> Lectura
                                <input class="form-check-input" type="radio" name="permisosUsuarios" value="-"> Cap permís
                            </div>
                            <div style="text-align: right">

                            {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary btn-success">Afegir usuari</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                      </div>
                      <div id="bu" class="tab-pane fade">
                        <h3>Borrar permís d'un usuari</h3>
                        <form id="formborrarPermisUsuari" action="" method="POST" style="display:inline">
                        <div class="form-group">
                            <label>Borrar permís Usuari: </label>
                            <select class="form-control" id="listaUsuariosBorrar" name="listaUsuariosBorrar" style="min-width:120px;"></select>
                        </div>
                        <div style="text-align: right">

                            {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary btn-success">Borrar permís</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                      </div>
                      <div id="cg" class="tab-pane fade">
                        <h3>Cambiar permís d'un grup</h3>
                        <form id="formcambiarPermisGrup" action="" method="POST" style="display:inline">
                            <div class="form-group">
                          <label>Grups: </label>
                          <select class="form-control" id="listaGruposCambiar" name="listaGruposCambiar" style="min-width:120px;"></select>
                        </div>
                        <div class="form-group">
                          <label>Selecciona un permís: </label>
                          <input id="cambiarPermisoGrupos" class="form-check-input" type="radio" name="permisosUsuarios" value="s"> Super
                          <input id="cambiarPermisoGrupow" class="form-check-input" type="radio" name="permisosUsuarios" value="w"> Escritura
                          <input id="cambiarPermisoGrupor" class="form-check-input" type="radio" name="permisosUsuarios" value="r"> Lectura
                          <input id="cambiarPermisoGrupo-" class="form-check-input" type="radio" name="permisosUsuarios" value="-"> Cap permís
                        </div>
                        <div style="text-align: right">

                            {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary btn-success">Cambiar</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                      </div>
                      <div id="ag" class="tab-pane fade">
                        <h3>Afegir nou grup</h3>
                        <form id="formafegirPermisGrup" action="" method="POST" style="display:inline">
                        <div class="form-group">
                            <label>Afegir permís grup: </label>
                            <select class="form-control" id="listaGruposAgregar" name="listaGruposAgregar" style="min-width:120px;"></select>
                        </div>
                            <div class="form-group">
                                <label>Selecciona un permís: </label>
                                <input class="form-check-input" type="radio" name="permisosUsuarios" value="s"> Super
                                <input class="form-check-input" type="radio" name="permisosUsuarios" value="w"> Escritura
                                <input class="form-check-input" type="radio" name="permisosUsuarios" value="r"> Lectura
                                <input class="form-check-input" type="radio" name="permisosUsuarios" value="-"> Cap permís
                            </div>
                            <div style="text-align: right">

                                {{ csrf_field() }}
                                    <button type="submit" class="btn btn-primary btn-success">Afegir grup</button>
                                </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            </div>
                      </div>
                      <div id="bg" class="tab-pane fade">
                        <h3>Borrar permís d'un grup</h3>
                        <form id="formborrarPermisGrup" action="" method="POST" style="display:inline">
                        <div class="form-group">
                            <label>Borrar permís grup: </label>
                            <select class="form-control" id="listaGruposBorrar" name="listaGruposBorrar" style="min-width:120px;"></select>
                        </div>
                        <div style="text-align: right">

                            {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary btn-success">Borrar permís</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                      </div>
                    </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pujar document -->
        <div id="modalPujarArxiu" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div>
                            <h3 class="panel-title text-center">
                                <span class="glyphicon glyphicon-file" aria-hidden="true"></span>
                                Pujar document
                            </h3>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form method="POST" enctype="multipart/form-data" action="{{action('CU_08Controller@postPujarDoc',$title)}}">
                        {{ csrf_field() }}
                            <div class="" > <!--panel-body style="padding:20px"-->
                                <div class="form-group">
                                    <label for="title">Nom del arxiu</label>
                                    <input type="text" name="nom" id="nom" class="form-control" required maxlength="59">
                                </div>

                                <div class="form-group">
                                        <label for="title">Ruta de l'arxiu</label>
                                        <input type="file" name="arxiu" id="arxiu" class="form-control" required>
                                </div>

                                <div class="form-group">
                                        <label for="synopsis">Descripció (Opcional) Límit 255 caràcters (BBDD)</label>
                                        <textarea name="desc" id="desc" class="form-control" rows="3" maxlength="254"></textarea>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary" > <!-- style="padding:8px 100px;margin-top:25px;" form-group  -->
                                            Pujar arxiu
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

        <!-- Pujar Versió -->
        <div class="modal fade" id="pujarVersioModal" role="dialog">
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
                        <form id="modalFormPujarVersio" method="POST" enctype="multipart/form-data" action="">
                        {{ csrf_field() }}
                            <input id="pujarVersioID" hidden name="id" value="">

                            <div class="form-group">
                                <label for="title">Nom del arxiu *</label>
                                <input type="text" name="nom" id="nom" class="form-control" maxlength="59" required>
                            </div>

                            <div class="form-group">
                                    <label for="title">Ruta de l'arxiu *</label>
                                    <input type="file" name="arxiu" id="arxiu" class="form-control" required>
                            </div>

                            <div class="form-group">
                                    <label for="synopsis">Descripció (Opcional) Límit 255 caràcters (BBDD)</label>
                                    <textarea name="desc" id="desc" class="form-control" rows="3" maxlength="254"></textarea>
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
                        <i>Els camps amb * són obligatoris</i>
                    </div>
                </div>
             </div>
        </div>

        <!-- Modal GeneraURL-->
            <form id="modalFormURL" action="" method="POST" style="display:inline">
                <div class="modal fade" id="generaURLModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">URL</h4>
                      </div>
                      <div class="modal-body">
                          <input id="nombreURL" name="nombreInput" type="text" class="form-control"> </br>
                      </div>
                      <div class="modal-footer" style="text-align: center">
                        {{ csrf_field() }}
                        <button id="buttonCopiarURL" type="submit" class="btn btn-primary btn-success">Copiar</button>
                      </div>
                    </div>
                  </div>
                </div>
            </form>

        <script>

            $("#enrere").click(function(e){window.history.back();});

            $('#descargarModal').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('book-id');
                var nombre = $(e.relatedTarget).data('book-nombre');
                var path = $(e.relatedTarget).data('book-path');

                $('#modalFormDescargarzip').attr('action', '../CU_19/'+id+'/'+path+'/'+nombre);

            });

            $('#generaPDF').on('show.bs.modal', function (e) {
                //Recollim la id, el nom, el path i el format del archiu on hem fet click
                var id = $(e.relatedTarget).data('book-id');
                var nombre = $(e.relatedTarget).data('book-nombre');
                var path = $(e.relatedTarget).data('book-path');
                var formato = $(e.relatedTarget).data('book-formato');
                var encode = encodeURIComponent(path);
                //Al fer click sobre "Descargar PDF" activem el controlador del CU13
                $('#modalFormDescargarpdf').attr('action', '../CU_13/'+id+'/'+nombre+'/'+path+'/'+formato);

            });

            $('#gestionarPermisosModal').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('book-id');
                var nombre = $(e.relatedTarget).data('book-nombre');
                $('#carpetaPermisosTexto').text(nombre);
                //establecemos las rutas de los forms
                $('#formcambiarPermisUsuari').attr('action', '../cambiarPermisUsuari/'+id);
                $('#formafegirPermisUsuari').attr('action', '../afegirPermisUsuari/'+id);
                $('#formborrarPermisUsuari').attr('action', '../borrarPermisUsuari/'+id);
                $('#formcambiarPermisGrup').attr('action', '../cambiarPermisGrup/'+id);
                $('#formafegirPermisGrup').attr('action', '../afegirPermisGrup/'+id);
                $('#formborrarPermisGrup').attr('action', '../borrarPermisGrup/'+id);
                //hacemos una consulta al servidor para rellenar los datos de los formularios
                $.get('../getDatos/'+id, function(response) {
                    $("#listaUsuariosCambiar").empty().append(response["cambiarUsuari"]);
                    $("#listaUsuariosAgregar").empty().append(response["afegirUsuari"]);
                    $("#listaUsuariosBorrar").empty().append(response["borrarUsuari"]);
                    $("#listaGruposCambiar").empty().append(response["cambiarGrup"]);
                    $("#listaGruposAgregar").empty().append(response["afegirGrup"]);
                    $("#listaGruposBorrar").empty().append(response["borrarGrup"]);
                })

                $("#listaUsuariosCambiar").change(function() {
                    var idusuari=$('option:selected', this).attr('id');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        dataType:"text",
                        data: {
                            idUsuari:idusuari,
                            idCarpeta:id
                        },
                        url: '../permisUsuari',
                        success: function(result){
                            $("#cambiarPermisUsuari"+result).prop("checked",true);
                        }});
                });

                $("#listaGruposCambiar").change(function() {
                    var idgrup=$('option:selected', this).attr('id');
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        dataType:"text",
                        data: {
                            idGrup:idgrup,
                            idCarpeta:id
                        },
                        url: '../permisGrup',
                        success: function(result){
                            $("#cambiarPermisoGrupo"+result).prop("checked",true);
                        }});
                });
            });

            $('#borrarModal').on('show.bs.modal', function(e) {
                var bookId = $(e.relatedTarget).data('book-id');
                var id = bookId.split(" ");
                var bookName = $(e.relatedTarget).data('book-name');
                $('#bookId').text(bookName);
                if(id[1] == "carpeta"){
                    $('#modalFormElim').attr('action', '../borrarCarpeta/'+id[0]);
                }else{
                    $('#modalFormElim').attr('action', '../borrarDocumento/'+id[0]);
                }

            });

            $('#crearCarpetaModal').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('book-id');
                $('#modalFormCrear').attr('action', '../crearCarpeta/'+id);
            });

            $('#modificarModal').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('book-id');
                var nombre = $(e.relatedTarget).data('book-nombre');
                var descripcion = $(e.relatedTarget).data('book-descripcion');
                var ultimaModificacio = $(e.relatedTarget).data('book-ultimamod');
                var modificatPer = $(e.relatedTarget).data('book-idUsuari');
                /*var propietari=$('#propietari').text();
                var modificatPer=$('#modificatPer').text();*/
                $('#nombreInput').val(nombre);
                $('#descripcionInput').val(descripcion);
                $('#ultimaModificacio').text(ultimaModificacio);
                $('#modificatIput').text(modificatPer);

                $('#modalFormModificar').attr('action', '../modificarCarpeta/'+id);
            });

            $('#moureCarpetaModal').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('book-id');
                var html = $(e.relatedTarget).data('book-name');
                $('#listaCarpeta').text("");
                $('#listaCarpeta').append(html);
                $(".arbol").click(function(e){$("#nombreMovCarpeta").val($(this).prop("id"));});

                $('#modalFormMoure').attr('action', '../moureCarpeta/'+id);
            });

            $('#moureDocumentModal').on('show.bs.modal', function(e) {

                var id = $(e.relatedTarget).data('book-id');
                var html = $(e.relatedTarget).data('book-name');
                $('#listaCarpetaD').text("");
                $('#listaCarpetaD').append(html);
                $(".arbol").click(function(e){$("#nombreMovDocumento").val($(this).prop("id"));});

                $('#modalFormMoureDocument').attr('action', '../moureDocument/'+id);
            });

            //Pujar Versió
            $('#pujarVersioModal').on('show.bs.modal', function(e){
                var id = $(e.relatedTarget).data('book-id');
                //postPujarVersio
                $("#pujarVersioID").val(id);

                $('#modalFormPujarVersio').attr('action', '../pujarVersio');
            });

            //Genera Url
            $('#generaURLModal').on('show.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('book-id');
                var idVer = $(e.relatedTarget).data('book-idversio');
                var path = $(e.relatedTarget).data('book-path');
                var url = "http://localhost/DAW2M14/public/CU12_URL_Descarrega/"+id+"/"+idVer+"/"+path;

                $('#nombreURL').val(url);

                $('#modalFormURL').attr('action', '../CU12_URL/'+id+"/"+idVer+"/"+path);
            });

            $("#buttonCopiarURL").click(function(){

                var copyText = document.getElementById("nombreURL");

                copyText.select();

                document.execCommand("Copy");

            });


        </script>
@stop
