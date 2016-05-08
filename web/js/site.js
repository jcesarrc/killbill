$('#academia-fecha_inicial_facturacion-disp').change(function () {

    $('.fecha_corte').html($(this).val().substring(0, 2));

});