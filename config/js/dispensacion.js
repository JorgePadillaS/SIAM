$(document).ready(function(){
    $('#programa').change(function(){
      var programa_id = $(this).val();
      if(programa_id != ''){
        $.ajax({
          url:"funciones/get_contratos.php",
          method:"POST",
          data:{programa_id:programa_id},
          dataType:"JSON",
          success:function(data){
            $('#num_contrato').html(data.options);
            $('#tipo_combustible').val(data.tipo_combustible);
            $('#cantidad_combustible_disponible').val(data.cantidad_combustible_disponible);
          }
        });
      }
    });
  });