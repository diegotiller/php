<?php
$vendas = array(10,20,30,40,20);
$custos = array(8,15,37,97,35);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projeto Gráficos</title>
</head>
<body>
	<!-- div onde é mostrado o grafico que fica dentro da div canvas -->
	<div style="width:500px">
		<canvas id="grafico"></canvas>
	</div>
	<!-- Importação do arquivo que cria gráficos -->
	<!-- referencia para graficos diferentes http://chartjs.org -->
	<script type="text/javascript" src="Chart.min.js"></script>
	<script type="text/javascript">
		//apos a pagina ser carregada executa a function
		window.onload = function(){
			//pegando contexto em 2 dimensões
			var contexto = document.getElementById("grafico").getContext("2d");
			//iniciando a biblioteca
			var grafico = new Chart(contexto, {
				//tipo do grafico emm barras 
				type:'line',
				//dados do gráfico
				data: {
					//item que vão ficar na linha orizontal
					labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],
					//customização gráfico vendas
					datasets: [{
						label:'Vendas',
						backgroundColor:'#FF0000',
						borderColor:'#FF0000',
						data:[<?php echo implode(',', $vendas); ?>],
						fill:false
					}, {
						//customização gráico custos
						label:'Custos',
						backgroundColor:'#00FF00',
						borderColor:'#00FF00',
						data:[<?php echo implode(',', $custos); ?>],
						fill:false
					}]
				}
			});
		}		
	</script>
</body>
</html>