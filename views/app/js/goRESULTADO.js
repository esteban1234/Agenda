$('body').on('click','#refresca a', function(e){
    e.preventDefault();

    idUSER = $(this).attr('href');
    accion = $(this).attr('data-accion');

    if( accion == "deleteTAREA")
    {
        $('#dialog-borrar');
        //alert('Como estas');
    }
});


$('#eliminar').on('click',function(){
    $.ajax({
        beforeSend: function(){
        },
        cache: false,
        type: 'POST',
        dataType: 'json',
        url:'ajax.php?mode=opciones',
        data:'accion='+accion+'&id='+idUSER,
        success: function(response){
            $('#_AJAX_REG_').fadeIn(500);
            $('#refresca').empty();
            $('#refresca').append(response.contenido);
            $('#_AJAX_REG_').append(response.mensaje);
            setTimeout(deleteMSJ,1000);
            $('#dialog-borrar').modal('toggle');

            //$('#_AJAX_REG_').empty();
        },
        error: function(){
            alert('Error del sistema, Vuelva a intentar');
        }
    });
});

function deleteMSJ() {
    $('#_AJAX_REG_').fadeOut(1500);
    $('#_AJAX_REG_').empty();
}