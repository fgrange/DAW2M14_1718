<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

/*
 * Para poder ejecutar el metodo que se encarga de mostrar si existen notificaciones, sea cual sea la vista
 * Incluyolas class Workflow, la declaro y llamo al metodo correspondiente.
 * Lo hice en este archivo ya que es comun para todos.
 */
// fede 04/04/2018 use App\Workflow;
// fede 04/04/2018 $Workflow = new Workflow();
// fede 04/04/2018 $Workflow->NotificacionWorkflow();


Route::get('/', function () {
    return view('welcome');
});

// CU01
// Eugenio
Route::get('/CU01_login', function () {
    return view('CU01_login');
});

Route::post('/CU01_login', "CU01_loginController@login");
//return "comprovant usuari";//view('CU01_login');
//});
//
//
// CU02
Route::get('/CU_2', function () {
    return view('/CU_2');
});
// CU03
//
//
//
// CU04
//Laia i Joy
Route::get('/consultarLogs', 'CU_04Controller@consultarLogs');
//
// CU05
//Laia
//Route::get('/buscarDocumentos', 'CU_05Controller@buscador');  // Se ha añadido la funcionalidad al Buscar de la cabecera.
Route::get('/resultadoBusqueda', 'CU_05Controller@buscarDocuments');
//
// CU06
//Comentario Javi Millan
//Comentario Sergio Plaza
Route::get("/editarPerfil", "CU06Controller@getEditarPerfil");
Route::post("/editarPerfil/edit", "CU06Controller@editarPerfilEdit"); //->middleware('auth');
//
// CU07
Route::get('/abrirCarpeta/{id}', 'CU_07Controller@abrirCarpeta');
//
//
// CU08
Route::get('/pujarDocument', 'CU_08Controller@getPujarDoc');

Route::post('/pujarDocument/{idCarpeta}', 'CU_08Controller@postPujarDoc');
// CU09
Route::Post('/moureDocument/{id}', 'CU_09Controller@moverDocumento');
//
//
// CU11
Route::get('/pujarVersio/{id}', 'CU_11Controller@getPujarVersio');

Route::post('/pujarVersio', 'CU_11Controller@postPujarVersio');
// CU12
//
Route::Post('/CU12_URL/{id}/{idVer}/{patha}/{path}', 'CU12_urlController@generaURL');
Route::Get('/CU12_URL_Descarrega/{id}/{idVer}/{patha}/{path}', 'CU12_urlController@descarregarURL');

//
// CU13
//
Route::Post('/CU_13/{id}/{nombre}/{patha}/{path}/{formato}', 'CU_13Controller@generaPDF');
//
// CU14
//
//
//
// CU15
Route::get('/promocionarVersio/{id}/{versioInterna}', 'CU_15Controller@getPromocionarVersio');
//
//
// CU16
Route::get('/veureVersions/{id}', 'CU_16Controller@veureVersions');
//
//
// CU17
Route::get('/eliminarVersio/{id}/{versioInterna}', 'CU_17_Controller@eliminarVersio');
//
//
// CU18
Route::get('/getDatos/{id}', 'CU_18Controller@getDatos');
Route::Post('/permisUsuari', 'CU_18Controller@permisUsuari');
Route::Post('/permisGrup', 'CU_18Controller@permisGrup');
Route::Post('/cambiarPermisUsuari/{id}', 'CU_18Controller@cambiarPermisUsuari');
Route::Post('/afegirPermisUsuari/{id}', 'CU_18Controller@afegirPermisUsuari');
Route::Post('/borrarPermisUsuari/{id}', 'CU_18Controller@borrarPermisUsuari');
Route::Post('/cambiarPermisGrup/{id}', 'CU_18Controller@cambiarPermisGrup');
Route::Post('/afegirPermisGrup/{id}', 'CU_18Controller@afegirPermisGrup');
Route::Post('/borrarPermisGrup/{id}', 'CU_18Controller@borrarPermisGrup');
//
// CU19
Route::Post('/CU_19/{id}/{path}/{nombre}', 'CU_19Controller@index');
////
// CU20
Route::Post('/borrarCarpeta/{id}', 'CU_20Controller@eliminarCarpeta');
Route::Post('/borrarDocumento/{id}', 'CU_20Controller@eliminarDocumento');
//
//
// CU21
Route::Post('/moureCarpeta/{id}', 'CU_21Controller@moverCarpeta');
//
//
// CU22
Route::Post('/modificarCarpeta/{id}', 'CU_22Controller@modificarCarpeta');
//
//
// CU23
Route::Post('/crearCarpeta/{id}', 'CU_23Controller@crearCarpeta');
//
//
// CU24
//
//
//
//CU_25
//Jorge & Issam
Route::get('/CU_25_CrearWorkFlow', 'CU_25Controller@getIndex');
Route::post('/newWorkflow', 'CU_25Controller@postCreate');

Route::get('/descarregaWorkflow/{idDocument}', 'CU_25Controller@descarregarDocument');
//
//
//
// CU26
//Jorge & Issam
Route::get('/CU_26', 'CU_26Controller@getIndex');
Route::post('/newPlantilla', 'CU_26Controller@postCreate');
//
// CU27
//
//Route::get('/CU_27_EditarPlantilla/', 'CU_27Controller@getEdit');
Route::get('/CU_27_EditarPlantilla/', 'CU_27Controller@getIndex');
Route::get('/CU_27_EditarPlantilla/{id}', 'CU_27Controller@getIndex');
Route::post('/CU_27_EditarPlantilla/{id}', 'CU_27Controller@editarPlantilla');
//
//
//
// CU28
Route::get('/CU_28_EliminarPlantilla/{id}', 'CU_28Controller@getEliminarPlatilla');
//
//
// CU29
//
//
//
// CU31
//
//
//
// CU32
//
//
//
// CU33
//
//
//
// CU34
//
//
//
// CU35 Laia
Route::get('/mostar_workflows', 'CU_35Controller@mostrar');
//
//
//
// CU36 Gestionar Grupos (Oscar y Carlos)
Route::get('CU_36_GestionarGrups', 'CU_36Controller@getCU_36');
//
//
// CU37 Eliminar Grupo (Oscar y Carlos)
Route::put('/delGrup', 'CU_37Controller@eliminarGrup');
//
//
// CU38 Modificar Grupo (Oscar y Carlos)
Route::put('/editGrup', 'CU_38Controller@modificarGrup');
//
//
// CU39 Modificar Membres (Oscar y Carlos)
//
//
// CU40 Crear Grupo (Oscar y Carlos)
Route::put('/newGrup', 'CU_40Controller@afegirGrup');
//
//
// CU41 Motrar Grups (Oscar y Carlos)
//
//
//prova
Route::get('prova', 'provaController@getIndex');
// CU42
Route::get('/CU_42_GestionarUsuaris', 'CU_42_Controller@mostrarUsuaris');
//
// CU43
Route::get('/CU_43_EliminarUsuari', 'CU_43Controller@mostraUsuari');
Route::post('/delUser', 'CU_43Controller@eliminarUsuari');
//
// CU44
Route::get('/CU_44_BaixaUsuari', 'CU_44_Controller@mostraUsuari');
Route::put('/baixaUser', 'CU_44_Controller@baixaUsuari');
//
// CU45
Route::get('/CU_45_ModificarUsuari', 'CU_45Controller@mostraUsuari');
Route::post('/editUser', 'CU_45Controller@modificarUsuari');
//
// CU46
Route::get('/CU_46_ModificarPertinencaGrups', 'CU_46_Controller@mostrarGrups');
Route::put('/modPerGrups', 'CU_46_Controller@modificarPertinencaGrups');
//
// CU47
Route::get('/CU_47_AltaUsuari', 'CU_47_Controller@mostraUsuari');
Route::put('/altaUser', 'CU_47_Controller@altaUsuari');
//
//
// CU48  Mostrar Usuaris (Oscar y Carlos)
Route::get('/CU_48_MostrarUsuaris', 'CU_48Controller@getIndex');
//
//
//
// CU49
//Route::get('/filtraLogs', 'CU_49Controller@filtraLogs'); Se ha juntado con el CU_04 Consultar Logs
Route::get('/filtraNom', 'CU_49Controller@filtraNom');
//
// CU50
//Jorge & Issam
Route::get('/CU_50', 'CU_50Controller@getIndex');
//Route::get('/CU_50', 'CU_50Controller@MostrarUsuari');
//
//
//CU51
Route::get('/CU_51', 'CU_51Controller@tancarSessio');
//
// CU52
Route::get('/CU_52_CrearUsuari', 'CU_52Controller@getIndex');
Route::post('/newUser', 'CU_52Controller@afegirUsuari');

//
// feina addicional

