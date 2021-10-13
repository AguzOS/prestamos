function registrar_libro_section() {
    $("#btn_registro_libro").on("click", function(e) {
        e.preventDefault();
        var campos = {}
        $("#form_registro_libro input, #form_registro_libro textarea").each(function() {
            campos[this.name] = this.value;
        });

        $.ajax({
            type: "post",
            url: "../insert/insert_libros.php",
            data: { "datos": campos }
        }).done(function(response) {
            console.log(response);
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
        });
    });
}