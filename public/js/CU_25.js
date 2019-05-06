$('#selectorPlantilla').change(function(){
    var idPlantilla = $(this).val();
    if (idPlantilla != 0){

      $.ajax({
         type:'GET',
         url:('/selectorPlantilla/' + idPlantilla),

         success:function(data){
           console.log(data);
            var js = JSON.parse(data);
            console.log(js);
         }
      });

      console.log(idPlantilla);
    }
});
