<?php
    session_start();
    if ($_SESSION['sesion']=="SI") {
        # code...
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include "../lib/head.php";
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <style>
        #body{
            background-image: url(../image/libros.jpg);
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        #seccion{
            margin: 1px 10px;
            float: right;
            background-color: #fff;
        }

        .formBox{
                margin-top: 10px;
                padding: 10px;
            }
            .formBox  h1{
                margin: 0;
                padding: 0;
                text-align: center;
                margin-bottom: 10px;
                text-transform: uppercase;
                font-size: 20px;
            }
            .inputBox{
                position: relative;
                box-sizing: border-box;
                margin-bottom: 10px;
            }
            .inputBox .inputText{
                position: absolute;
                font-size: 10px;
                line-height: 10px;
                transition: .5s;
                opacity: .5;
            }
            .inputBox .input{
                position: relative;
                width: 50%;
                height: 20px;
                background: transparent;
                border: none;
                outline: none;
                font-size: 15px;
                border-bottom: 1px solid rgba(0,0,0,.5);

            }
            .textarea{
                position: relative;
                width: 50%;
                height: 100px;
                background: transparent;
                border: none;
                outline: none;
                font-size: 24px;
                border-bottom: 1px solid rgba(0,0,0,.5);
            }
            .focus .inputText{
                transform: translateY(-30px);
                font-size: 18px;
                opacity: 1;
                color: #00bcd4;

            }
            .button{
                width: 10%;
                height: 40px;
                border: none;
                outline: none;
                background: #03A9F4;
                color: #fff;
                font-size: 15px;
            }
    </style>
</head>
<body id="body" onload="buscarlibro(),buscarusuario()">
    <?php
        include "../lib/header.php";
    ?>
    <section class="">
        <div  class="panel panel-primary col-xs-12">
            <div class=" panel-heading" style="text-align: center;">
                <h3 >Prestamo de libros</h3>
            </div>
            <center>
                <div class="container-fluid"><div class="formBox">
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-xs-3 col-md-3">
                                    <label> Buscar usuario</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-md" name="nombre" id="nombre" onkeyup="buscarusuario();">
                                            <div class="input-group-btn">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-3 col-md-3">
                                    <label for=""> Nombre de usuario</label>
                                    <div id="usuarios" >
                                    </div>
                                </div>
                                <div class="col-xs-3 col-md-3">
                                    <label for=""> cantidad de libros</label>
                                    <div class="inputBox ">
                                        <input type="number" min="1" name="c" id="c" class="input" placeholder="Cantidad" relquired>
                                    </div>
                                </div>
                                <div class="col-xs-3 col-md-3">
                                    <img src="../image/lib.jpg">
                                </div>
                            </div>
                    </div>
                    <div class="row">                        
                        <div class="col-sm-3">
                            <div class="inputBox ">
                                <label style="font-size:15px;" for="">Tiempo: </label>
                                <input type="number" min="1" name="dias" id="dias" class="input" onkeyup="fecha();" value=0 relquired>
                                <label style="font-size:15px;" for="">Dias </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="inputBox ">
                                <label style="font-size:15px;" for="">Fecha de entrega: </label>
                                <input type="text" name="d" id="d" class="input" >
                            </div>
                        </div>
                    </div>
                                <br>
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <label> Buscar libro</label>
                            <div class="form-group">
                                <div class="input-group">
                                     <input type="text" class="form-control input-md" name="book" id="book" onkeypress="buscarlibro();">
                                     <div class="input-group-btn">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-4">
                            <label for=""> Nombre del libro</label>
                            <div id="libro">
                            </div>
                        </div>
                        <div class="col-sm-3">
                          <button id="adicionar" class="glyphicon glyphicon-share-alt btn btn-success" type="button"> Agregar a la tabla</button>
                      </div>
                    </div>

                    <div id="m">
                    </div>
                        </form>
                        <table  id="mytable" class="table table-bordered table-hover ">
                        <tr>
                            <th>Nobmre de usuario</th>
                            <th>Nombre de libro</th>
                            <th>Cantidad de libros</th>
                            <th>Fecha de entrega</th>
                            <th>Eliminar</th>

                        </tr>
                        </table>
                        <div id="button">
                            <button class='btn btn-info' id='aceptar' style='float: left;'>Realizar prestamo</button>
                            <div id="successfull"></div>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script>
var numero = document.getElementById('dias');

function fecha() {
  //la fecha
  var TuFecha = new Date();
  
  //dias a sumar
  var dias = parseInt(numero.value);
  
  //nueva fecha sumada
  TuFecha.setDate(TuFecha.getDate() + dias);
  //formato de salida para la fecha
  document.getElementById("d").value = TuFecha.getFullYear() + '/' +
    (TuFecha.getMonth() + 1) + '/' + TuFecha.getDate();
}

function buscarusuario(){
    var texto = document.getElementById("nombre").value;

    var params = {
        "texto" : texto
    };

    $.ajax({
        data: params,
        url: "function_buscar_usuario.php",
        type: "GET",
        success: function (response){
            $("#usuarios").html(response);
        }
    });
}

function buscarlibro(){
    var busqueda = document.getElementById("book").value;

    var parametro = {
        "busqueda" : busqueda
    };

    $.ajax({
        data: parametro,
        url: "function_buscar_libro.php",
        type: "GET",
        success: function(responsive){
            $("#libro").html(responsive);
        }
    })
}

var i = 0;
$(document).ready(function() {
    $("#aceptar").attr("disabled","disabled");
    $("#d").attr("disabled","disabled");
//obtenemos el valor de los input //contador para asignar id al boton que borrara la fila
    $('#adicionar').click(function() {
        var cantidad = document.getElementById("c").value;
        var fecha = document.getElementById("d").value;
            if (cantidad=="" || fecha=="") {
                $.alert({
                    title: '¡Campos vacios!',
                    content: 'Rellene los campos faltantes',
                })
            } 
            else {
                $("#aceptar").removeAttr("disabled");
                
                i++;
                var idusuario = document.getElementById("idu").value;
                var idlibro = document.getElementById("id_l").value;
                var libro = document.getElementById("nol").value;
                var nombre = document.getElementById("nom").value;
                var cantidad = document.getElementById("c").value;
                var fecha = document.getElementById("d").value;
                var st = document.getElementById("st").value;
                var fila = "<tr id='row" + i + "'><td hidden><input hidden type='text' id='stock"+i+"' value="+st +"><input hidden type='text' id='id"+i+"' value="+ idusuario +"></td><td hidden>" + idusuario + "</td><td hidden><input hidden type='text' id='b"+i+"' value="+ idlibro +"><td hidden>" + idlibro + "</td><td>" + nombre + "</td><td><input hidden type='text' id='libro"+i+"' value="+libro +">"+libro+"</td><td hidden><input hidden type='text' id='c"+i+"' value="+ cantidad +"><td>"+ cantidad + "</td><td hidden><input hidden type='text' id='d"+i+"' value="+ fecha +"><td>" + fecha + "</td><td><button type='button' name='remove' id='" + i + "' class='btn btn-danger glyphicon glyphicon-trash btn_remove'>Quitar</button></td></tr>"; //esto seria lo que contendria la fila")

                $('#mytable tr:first').after(fila);
                $("#adicionados").text(""); 
                var nFilas = $("#mytable tr").length;
                $("#adicionados").append(nFilas - 1);
                //le resto 1 para no contar la fila del header
                document.getElementById("nom").focus();
            }
        });
        
        $("#aceptar").click(function () {
            var result = confirm("Guardar registros");
            if (result) {
                for (var a=0; a < i; ) {
                    a++;
                    var usuario = document.getElementById("id"+a).value;
                    var book = document.getElementById("b"+a).value;
                    var c = document.getElementById("c"+a).value;
                    var d = document.getElementById("d"+a).value;
                    var stock = document.getElementById("stock"+a).value;
                        var nl = document.getElementById("libro"+a).value;
                    if (c>stock) {
                        $.alert({
                            title: '¡Cantidad de libros!',
                            type: 'red',
                            icon: 'fa fa-warning',
                            content: 'La cantidad de libros de '+nl+' a prestar es mayor a la existente'
                        })
                    } 
                    else {
                        // alert(" libro "+book);
                        var parametro = {
                            "usuario" : usuario,
                            "book" : book,
                            "c" : c,
                            "d" : d
                        };
                        $.ajax({
                            data: parametro,
                            url: "../insert/insert_prestamo.php",
                            type: "POST",
                            success: function (response) {
                                $("#successfull").html(response);
                            }
                        });
                        setTimeout("location.href='../forms/registrar_prestamo.php'",5000);
                    }
                 }
            }
        });
        $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        
        $('#row' + button_id + '').remove(); //borra la fila
        
        $("#adicionados").text("");
        var nFilas = $("#mytable tr").length;
        $("#adicionados").append(nFilas - 1);
        });
    });
</script>
</html>
<?php
    }
    else {
        header("Location: ../index.php");
    }
?>