
$(document).ready(function() {
    var selectPrograma = $("#programa");
    var presupuestoInicial = $("#presupuesto_inicial");
    var presupuestoDisponible = $("#presupuesto_disponible");
    

    $('#programa').change(function() {
      var programa = $(this).val();

      $.ajax({
        url: 'funciones/Obtener_presupuesto_usado.php',
        method: 'POST',
        data: { programa: programa },
        success: function(response) {
          $('#presupuesto_usado').val(response);
        }  
      });
      var presupuestoUsado = $("#presupuesto_usado");
      var valorSeleccionado = selectPrograma.val();
      var valores = valorSeleccionado.split("|");
      presupuestoInicial.val(valores[1]);
      presupuestoDisponible.val(presupuestoInicial.val() - presupuestoUsado.val());
      console.log(presupuestoDisponible.val);
      
    });
  });