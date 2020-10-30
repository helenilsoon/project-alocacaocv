$(document).ready(function() {
    $('#search').keypress(function(event) {
        $('#modal').show();

        if ($('#search').val().length > 0) {
            $.ajax({
                url: 'resultado.php',
                method: 'POST',
                data: $('#procurar_profissional').serialize(),
                success: function(data) {
                    $('#resultado-pesquisa').html(data);
                },

            });

        }
    });


    $('#btn-procurar').click(function(event) {
        event.preventDefault();
        $('#modal').show();
        if ($('#search').val().length > 0) {
            $.ajax({
                url: 'resultado.php',
                method: 'POST',
                data: $('#procurar_profissional').serialize(),
                success: function(data) {

                    $('#resultado-pesquisa').html(data);

                }

            });
        }
    });



    $('#modal').mouseout(function() {
        $('#modal').hide();
    });
    if ($('#resultado-pesquisa') == '') {
        $('#resultado-pesquisa').html("Sem resultados");

    }
});