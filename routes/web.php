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

Route::get('/', function () {
    return view('welcome');
});

// CU01
//
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
Route::get('/consultarLogs','CU_04Controller@consultarLogs');
//
// CU05
//Laia
Route::get('/buscarDocumentos','CU_05Controller@buscador');
Route::get('/resultadoBusqueda','CU_05Controller@buscarDocuments');
//
// CU06
//Comentario Javi Millan
//Comentario Sergio Plaza
Route::get("/editarPerfil/{id}", "CU06Controller@getEditarPerfil");
Route::post("/editarPerfil/edit/{id}", "CU06Controller@editarPerfilEdit"); //->middleware('auth');
//
// CU07
Route::get('/abrirCarpeta/{id}','CU_07Controller@abrirCarpeta');
//
//
// CU08
Route::get('/CU_08', 'CU_08Controller@getPujarDoc');

Route::post('/CU_08','CU_08Controller@postPujarDoc');
// CU09
//
//
//
// CU11
//
//
//
// CU12
//
//
//
// CU13
//
//
//
// CU14
//
//
//
// CU15
//
//
//
// CU16
//
//
//
// CU17
//
//
//
// CU18
//
//
//
// CU19
//
// CU20
// Carlos Gomez y Oscar Robles
//
//
// CU21
//
//
//
// CU22
//
//
//
// CU23
//
//
//
// CU24
//
//
//
// CU25
//
//
//
// CU26
//Jorge & Issam 
 Route::get('/CU_26', 'CU_26Controller@getIndex');
//});
//
//
//
//
//
// CU27
//
//
//
// CU28
//
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
// CU35
//
//
//
// CU36 Gestionar Grupos (Oscar y Carlos)
Route::get('CU_36_GestionarGrupos', 'CU_36Controller@getCU_36');
//
//
// CU37 Eliminar Grupo (Oscar y Carlos)
Route::get('CU_37_EliminarGrupo', 'CU_37Controller@getCU_37');
//
//
// CU38 Modificar Grupo (Oscar y Carlos)
Route::get('CU_38_ModificarGrupo', 'CU_38Controller@getCU_38');
//
//
// CU39 Modificar Membres (Oscar y Carlos)
//Route::get('CU_39_ModificarMembres', 'CU_39Controller@getCU_39');
//
//
// CU40 Crear Grupo (Oscar y Carlos)
Route::get('CU_40_CrearGrupo', 'CU_40Controller@getCU_40');
//
//
// CU41
//
//
//
// CU42 Aleix_Prat
Route::get('/CU_42','CU42Controller@getIndex');
//  Route::get('/', function(){
//      return view("CU_42");
//  });
//  Route::post('/CU42Controller',"CU42Controller@getIndex")
//
// CU43
//
//
//
// CU44
//
//
//
// CU45
//
//
//
// CU46
//
//
//
// CU47 Aleix Prat i Gloria Taboada
Route::get('/CU_47/{id}','CU47Controller@getIndex');
//
//
// CU48 Aleix Prat i Gloria Taboada
Route::get('/CU_48','CU48Controller@getIndex');
//
//
//
// CU49
Route::get('/filtraLogs','CU_49Controller@filtraLogs');
//
//
// CU50
//Jorge & Issam
Route::get('/CU_50','CU_50Controller@getIndex');
//
// CU52
Route::get('/CU_52', 'CU_52Controller@getIndex');
Route::get('/CU_45', 'CU_45Controller@mostraUsuari');
Route::post('/newUser', 'CU_52Controller@afegirUsuari');
Route::post('/modUser/{id}', 'CU_45Controller@modificarUsuari');

//
// feina addicional


// mes proves
