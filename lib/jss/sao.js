var graficaBarras=document.getElementById("graficaSao");

var valores={
	label:"Numero de visitas al Mes",
	data:[1500,2300,1209,67812,123465,987162,345678,150231,180450,200000,230000,245098]
};

var grafica=new Chart(graficaBarras,{
		
		type:'bar',
		data:{
			labels:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
			'Septiembre','Octubre','Noviembre','Diciembre'],
			datasets:[valores]
		}
});