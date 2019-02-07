
function eliminaGrup(t) {

    var id = $(t).parent().parent().children('#nombreGrupo').children('#idGrup').val();
    idGrup = id;

    //si existe input hidden idGrupEliminar lo elimina
    $('#idGrupEliminar').remove();

    //coge nombre grupo y añade a modal-body de eliminar
    var nomGrup = $(t).parent().parent().children('#nombreGrupo').children('#nomGrup').val();
    
    //asigna nombre
    $('#nombre_grupo').text('"' + nomGrup + '"');
    
    //marca el modal objectivo del boton donde hacemos click
    var idModal = $(t).attr("data-target");
    
    //creamos y añadimos id del grup modificat a un input oculto para recogerlo en el controlador
    var modal_body_eliminarGrup = $(idModal).children([0]).children([0]).children([0]).children([0]);
    input_grupEliminar = jQuery('<input type="hidden" id="idGrupEliminar" name="idGrupEliminar" value="' + idGrup + '">');
    modal_body_eliminarGrup.append(input_grupEliminar);
}

function modificaGrup(t) {

    var stringIdUsuarisGrup = '';
    var id = $(t).parent().parent().children('#nombreGrupo').children('#idGrup').val();
    idGrup = id;
    
    //Si existe input hidden ID stringIdUsuarisGrup o idGrupEliminar los elimina
    $('#stringUsuarisGrup').remove();
    $('#idGrupEliminar').remove();
    
    //Asigna nombre grupo en input
    var nomGrup = $(t).parent().parent().children('#nombreGrupo').children('#nomGrup').val();
    $('#nom_Grup_Modificar').val(nomGrup);
    
    //Marca el modal objectivo del boton donde hacemos click
    var idModal = $(t).attr("data-target");
    var column_UsuarisGrup = $(idModal).children([0]).children([0]).children([0]).children([0]).children('.modal-body').children('.containerModificaMembres').children('.columnUsuarisGrup');
    
    //Elimina 'label' de los usuarios de grup si existen
    $(idModal).children([0]).children([0]).children([0]).children([0]).children('.modal-body').children('.containerModificaMembres').children('.columnUsuarisGrup').children('label').each(function () {
        $(this).remove();
    });
    
    //Elimina 'br' de los usuarios de grup si existen
    $(idModal).children([0]).children([0]).children([0]).children([0]).children('.modal-body').children('.containerModificaMembres').children('.columnUsuarisGrup').children('br').each(function () {
        $(this).remove();
    });
    
    //Recorre miembros del grupo creados en 'mostrar grupos' y los añade a la columna usuarios de grupos de 'modificar miembros'
    $(t).parent().parent().children('#nombreMiembros').children('#idUsuariGrup').each(function () {
        var idUsuari = $(this).val();
        var nomUsuari = $(this).next('input').val();

        var grupUsuari = jQuery('<label id="usuari' + idUsuari + '"><input type="checkbox" id="usuari' + idUsuari + '" style="cursor:default;" name="usuari" value="' + nomUsuari + '">' + nomUsuari + '</label><br>');
        column_UsuarisGrup.append(grupUsuari);

        stringIdUsuarisGrup = stringIdUsuarisGrup + idUsuari + ',';
    });
    
    //Quita coma final de string de usuarios del grupo
    stringIdUsuarisGrup = stringIdUsuarisGrup.substring(0, stringIdUsuarisGrup.length - 1);
    
    //Añade string con id de todos los usuarios nuevos del grupo modificado
    input_idStringUsuarisGrup = jQuery('<input type="hidden" id="stringUsuarisGrup" name="stringUsuarisGrup" value="' + stringIdUsuarisGrup + '">');
    column_UsuarisGrup.append(input_idStringUsuarisGrup);
    
    //Añade id del grupo modificado
    input_grupEliminar = jQuery('<input type="hidden" id="idGrupEliminar" name="idGrupEliminar" value="' + idGrup + '">');
    column_UsuarisGrup.append(input_grupEliminar);
}


function afegirUsuari(t) {
    var idLabel;
    var valLabel;
    var idLabel2;
    var arrayUsuarisGrup = [];
    var stringIdUsuarisGrup = '';
    
    //Si existe input hidden ID stringIdUsuarisGrup la elimina
    $('#stringUsuarisGrup').remove();
    
    //Recorre columna usuarios grupo (recoge id)
    $(t).parent().next().children('label').each(function () {
        idLabel = this.id;
        arrayUsuarisGrup.push(idLabel);
    });
    
    //Recorre columna usuarios
    $(t).parent().prev().children('label').each(function () {
        if ($(this).children('input').is(':checked')) {
            idLabel = this.id;
            valLabel = this.innerText;
            idLabel = idLabel.replace('id', '');
            
            //Si no hay usuarios en la columna de usuaios grupo los añade
            if (arrayUsuarisGrup.length === 0) {
                input = jQuery('<label id="' + idLabel + '"><input type="checkbox" id="' + idLabel + '" style="cursor:default;" name="usuari" value="' + valLabel + '">' + valLabel + '</label><br>');
                $(t).parent().next().append(input);

            } else {
                //Comprueba si esta en la columna de usuarios grupo
                for (var i in arrayUsuarisGrup) {
                    idLabel2 = arrayUsuarisGrup[i];
                    if (idLabel === idLabel2) {
                        return false;
                    }
                    //Si no esta añade el usuario a la columna de usuarios del grupo
                    var s = parseInt(i) + 1;
                    if ((idLabel !== idLabel2) && (arrayUsuarisGrup.length === s)) {
                        input = jQuery('<label id="' + idLabel + '"><input type="checkbox" id="' + idLabel + '" style="cursor:default;" name="usuari" value="' + valLabel + '">' + valLabel + '</label><br>');
                        $(t).parent().next().append(input);
                    }
                }
            }
        }
    });
    
    //Recorre usuarios grupo y los añade a string de usuarios grupo
    $(t).parent().next().children('label').each(function () {
        idLabel = this.id;
        idUsuari = idLabel.replace('usuari', '');
        stringIdUsuarisGrup = stringIdUsuarisGrup + idUsuari + ',';

    });
    
    //Quita coma final del strinf de usuarios grupo
    stringIdUsuarisGrup = stringIdUsuarisGrup.substring(0, stringIdUsuarisGrup.length - 1);
    
    //Añade string de usuarios grupo en input hidden a columna usuarios
    input_idStringUsuarisGrup = jQuery('<input type="hidden" id="stringUsuarisGrup" name="stringUsuarisGrup" value="' + stringIdUsuarisGrup + '">');
    $(t).parent().next().append(input_idStringUsuarisGrup);
}

function eliminarUsuari(t) {
    var stringIdUsuarisGrup = '';
    
    //elimina string de usuarios grupo si esta creado
    $('#stringUsuarisGrup').remove();
    
    //recorre usuarios grupo y los si estan marcados los elimina
    $(t).parent().next().children('label').each(function () {
        if ($(this).children('input').is(':checked')) {
            $(this).next('br').remove();
            $(this).remove('input');
            $(this).remove();
        }
    });
    
    //recorre usuarios grupo y los añade a string de usuarios grupo
    $(t).parent().next().children('label').each(function () {
        idLabel = this.id;
        idUsuari = idLabel.replace('usuari', '');
        stringIdUsuarisGrup = stringIdUsuarisGrup + idUsuari + ',';
    });
    
    //quita coma final
    stringIdUsuarisGrup = stringIdUsuarisGrup.substring(0, stringIdUsuarisGrup.length - 1);
    
    //añade string de usuarios grupo en input hidden a columna usuarios 
    input_idStringUsuaris = jQuery('<input type="hidden" id="stringUsuarisGrup" name="stringUsuarisGrup" value="' + stringIdUsuarisGrup + '">');
    $(t).parent().next().append(input_idStringUsuaris);
}