var graficaBarras=document.getElementById("graficaRe:Zero");

var valores={
	label:"Numero de visitas al Mes",
	data:[10245,15234,18348,202978,25816,31784,37789,45123,56890,65928,80123,150723]
};

var grafica=new Chart(graficaBarras,{
		
		type:'horizontalBar',
		data:{
			labels:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
			'Septiembre','Octubre','Noviembre','Diciembre'],
			datasets:[valores]
		}
});