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
            $('#refresca').empty();
            $('#refresca').append(response.contenido);
            $('#_AJAX_REG_').append(response.mensaje);
            $('#dialog-borrar').modal('toggle');
        },
        error: function(){
            alert('Error del sistema, Vuelva a intentar');
        }
    });
});