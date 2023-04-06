
$(document).ready(function() {
  var selectPrograma = $("#programa");
  var presupuestoInicial = $("#presupuesto_inicial");
  var presupuestoDisponible = $("#presupuesto_disponible");
  var presupuestoUsado ;
  var pinicial;
  
  $('#programa').change(function() {
    var programa = $(this).val();
    var valorSeleccionado = selectPrograma.val();

    var valores = valorSeleccionado.split("|");

    presupuestoInicial.val(valores[1]);

    $.ajax({
      url: 'funciones/Obtener_presupuesto_usado.php',
      method: 'POST',
      data: { programa: programa },
      success: function(response) {
        $('#presupuesto_usado').val(response);
        presupuestoUsado=response;
        pinicial=valores[1];
        var total=valores[1]-presupuestoUsado;
        console.log(total);
        presupuestoDisponible.val(total);
      }  
    });
  });

  $('#guardar').click(function() {
    var montoCompra = $('#monto_compra').val();
    if (montoCompra > presupuestoDisponible.val()) {
      alert('El monto de la compra no puede ser mayor al presupuesto disponible.');
      return false; // Impide que se realice la acción
    }
    // Si el monto de la compra es menor o igual al presupuesto disponible, se realiza la acción
  });
});