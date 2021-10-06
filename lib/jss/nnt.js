var graficaLinea=document.getElementById("graficannt");

var valores={
	label:"Numero de visitas al Mes",
	data:[100289,183123,200456,290276,400182,470176,598209,650810,710920,800123,1058912,2004568]
};

var grafica=new Chart(graficaLinea,{
		
		type:'line',
		data:{
			labels:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
			'Septiembre','Octubre','Noviembre','Diciembre'],
			datasets:[valores]
		}
});