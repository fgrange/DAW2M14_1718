// Selector de platillas con ajax
$('#selectorPlantilla').change(function(){
    var idPlantilla = $(this).val();
    if (idPlantilla != 0){

      $.ajax({
         type:'GET',
         url:('/selectorPlantilla/' + idPlantilla),
         dataType: "json",
         success:function(data){
            var values = [];
            //Agafem tots els revisors i els fiquem dins un array
            $.each(data.rev, function(i){
                values[i] = data.rev[i].idUsuariRevisor;
            });
            // Seleccionem tots els revisors al multiple
            $("#selectRevisors").val(values);
            // Seleccionem l'aprovador al dropdown
            $("#selectAprovador").val(data.plantilla[0].idUsuariAprovador);
         }
      });
    }
});

// Datepicker
$(document).ready(function(){
  var date_input=$('#datepicker .input-group.date');
  var options={
    format: 'dd-mm-yyyy',
    todayHighlight: true,
    autoclose: true,
  };
  date_input.datepicker(options);

})
