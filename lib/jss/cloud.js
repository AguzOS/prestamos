
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