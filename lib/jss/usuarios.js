function ver($id) {
	//alert($id);
	var nombre=$('input[name=n'+$id+']').val();
	var apellidos=$('input[name=a'+$id+']').val();
	var carrera=$('input[name=c'+$id+']').val();
	var puesto=$('input[name=p'+$id+']').val();
	var foto=$('input[name=fu'+$id+']').val();
	var cuenta=$('input[name=nu'+$id+']').val();
	$("#nombre").html(nombre,{});
	$("#apellidos").html(apellidos,{});
	$("#carrera").html(carrera,{});
	$("#puesto").html(puesto,{});
	$("#cuenta").html(cuenta,{});
	$("#foto").html("<img class='img-responsive thumbnail ' src='../fotosDePerfil/"+foto+".jpg'>",{});
}

$(document).ready(function(){
	(function($){

	$('#filtrar').keyup(function(){

		var rex=new RegExp($(this).val(),'i');
		
		$('.buscar #busqueda').hide();
		$('.buscar #busqueda').filter(function(){
			return rex.test($(this).text());	
}).show();
})

}(jQuery));
});

////////////////////////////////////////////////////////Agregar
        $("#formulariodepto").on("submit", function(e){
			var nu=$('input[name=nu]').val();
			var co=$('input[name=co]').val();
			var co2=$('input[name=co2]').val();
			var cantidad=$('input[name=cantidad]').val();
			var noexist=0;
			var diferente=0;
			$('#tamanioCampos').html('',{});
			for(i=0;i<cantidad;i++){
					if($('input[name=asa'+i+']').val()==nu){
						noexist=1;
					   $('input[name=nu]').css("border-color",'red');
			   			$("#usuarioCampos").html('<div class="alert alert-danger"><h9>Nombre de usuario no disponible</h9>\n\
			   			<button type="button" class="close" data-dismiss="alert">&times;</button></div>',{});
			   			break;
			   }else {
				   noexist=0;
				   }
			}
			
			if(co!=co2){diferente=1;}
			
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formulariodepto"));
			
			if(co.length<7 | co2.length<7 | noexist==1 | diferente==1){
				
				if(co.length<7){$('input[name=co]').css("border-color","red");
				$('#pwdCampos').html('<div class="alert alert-danger"><h9>Mínimo 7 caacteres</h9>\n\
				<button type="button" class="close" data-dismiss="alert">&times;</button></div>',{});}
				else{$('input[name=co]').css("border-color","gray");}
				
				if(co2.length<7){$('input[name=co2]').css("border-color","red");
				$('#pwdCampos').html('<div class="alert alert-danger"><h9>Mínimo 7 caracteres</h9>\n\
				<button type="button" class="close" data-dismiss="alert">&times;</button></div>',{});}
				else{$('input[name=co2]').css("border-color","gray");}
				
				if(noexist==1){$('input[name=nu]').css("border-color","red");}
				else{$('input[name=nu]').css("border-color","gray");
				$("#usuarioCampos").html('',{});
				}
				
				if(diferente=1){
					$('input[name=co]').css("border-color","red");
					$('input[name=co2]').css("border-color","red");
				$('#pwdCampos').html('<div class="alert alert-danger"><h9>Contraseas no coinciden</h9>\n\
				<button type="button" class="close" data-dismiss="alert">&times;</button></div>',{});}
				
			} else {
				$('input[name=nu]').css("border-color","gray");
				$('input[name=co]').css("border-color","gray");
				$('input[name=co2]').css("border-color","gray");
				$('#pwdCampos').html('',{});
				$('#usuarioCampos').html('',{});
				$('#pwdCampos').html('',{});
				
				$.ajax({
                url:"../usuario/GuardarUsuarios.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     		processData: false,
	     		 beforeSend:function(objeto){ 
            	},
				timeout:10000,
	     		complete:function(){
					//$('#tamanioCampos').css('display','none');
					$('#tamanioCampos').html('<div class="alert alert-success"><h9>Registro realizado correctamente</h9>\n\
						<button type="button" class="close" data-dismiss="alert">&times;</button></div>',{});
					document.getElementById("formulariodepto").reset();
					$('#actualizar').load('../usuario/scripts/consultaUsuarios.php');
					}});

			}
               return false;
        });
////////////////////////////////////////////////////////envia datos
function datosAmodifcar($id){
	var nombre=$('input[name=n'+$id+']').val();
	var apellidos=$('input[name=a'+$id+']').val();
	var carrera=$('input[name=c'+$id+']').val();
	var puesto=$('input[name=p'+$id+']').val();
	//$("#n").html(nombre,{});
	
	$('input[name=nomb]').val(nombre);
	$('input[name=apel]').val(apellidos);
	$('input[name=carr]').val(carrera);
	$('input[name=pues]').val(puesto);
	$('input[name=idu]').val($id);
} 

//////////////////modificar
        $("#formularioModificar").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formularioModificar"));
            $.ajax({
                url:"../usuario/ModificarUsuarios.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     		processData: false,
	     		 beforeSend:function(objeto){ 
            	},
				timeout:10000,
	     		complete:function(){
					//$('#tamanioCampos').css('display','none');
					$('#modificado').html('<div class="alert alert-success"><h9>Datos modificados correctamente</h9>\n\
						<button type="button" class="close" data-dismiss="alert">&times;</button></div>',{});
					document.getElementById("formulariodepto").reset();
						$('#actualizar').load('../usuario/scripts/consultaUsuarios.php');
					}
            });			
               return false;
        });
///////////////////Envia datos para eliminar
function enviaDatosAeliminar($id){
	$('input[name=idue]').val($id);
	var nombre=$('input[name=n'+$id+']').val();
	$('#n2').html("¿Esta seguro de eliminar estos datos?",{});
						$('#Eliminado').html('',{});
	}
/////////////////////////////////////////////////////Eliminar
        $("#formularioEliminar").on("submit", function(e){
            e.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formularioEliminar"));
            $.ajax({
                url:"../usuario/EliminarUsuarios.php",
                type: "POST",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
	     		processData: false,
	     		 beforeSend:function(objeto){ 
            	},
				timeout:10000,
	     		complete:function(){
					//$('#tamanioCampos').css('display','none');
					$('#Eliminado').html('<div class="alert alert-success"><h9>Datos eliminados correctamente</h9>\n\
						<button type="button" class="close" data-dismiss="alert">&times;</button></div>',{});
					$('#actualizar').load('../usuario/scripts/consultaUsuarios.php');
					}
            });			
               return false;
        });
/////Eliminar cuenta
function enviaDatosAeliminarCuenta($id){
	}