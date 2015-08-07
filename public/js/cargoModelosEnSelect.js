$(document).ready(function() {
    $("#actividad").change(function(evento){
        category_id = $(this).val();
        $('#profesor').empty();
        $('#profesor').prop('disabled', false);
        $.ajax({
            type: 'get',
            url:  '/api/profesores',
            data: 'category_id='+category_id,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success:function(datos, textStatus, jqXHR){
                $.each(datos,function(i, value ){
                    $('#profesor').append('<option value=' + value['id']+ '>' + value['nombre'] + '</option>');
                }); // each
                $('#profesor' ).change();
            },
            error:function(datos){
                alert("Este callback maneja los errores " + datos);
            }

        }); // ajax


    }); // change`
});