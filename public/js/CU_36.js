var idGrup;
var nomGrup;

//modificar y eliminar grupo
function idGrup(id) {
    idGrup = id;
}

function nomGrup(nom) {
    nomGrup = nom;
}

//crear grupo
function nouGrup(id) {
    //recorre bbdd y asigna id a nuevo grupo
    id++;
    idGrup = id;
}

//crear grupo
function crear() {
    //crea grupo con idGroup nuevo
    window.location.replace("http://localhost/DAW2M14/public/CU_40_CrearGrupo/"+idGrup);
}

//modificar grupo
function guardar() {
    //guarda datos grupo
    alert('guardar ' + idGrup);
}

//eliminar grupo
function eliminarGrup() {
    //eliminar grupo
    window.location.replace("http://localhost/DAW2M14/public/CU_37_EliminarGrupo/"+idGrup);
    
    $("#myModal_3").modal("hide");
}