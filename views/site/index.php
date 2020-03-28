<?php
/* @var $this yii\web\View */

$this->title = 'Menu Principal - Projeto AMA';
?>
<style>
	h3{
		margin-top: 0px;
	}

	.card{
		margin-left: 5px;
	}

</style>

<div class="site-index">

	<canvas id="myChart" width="400" height="150">
		<p>Hello Fallback World</p>
	</canvas>


</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>

	var ctx = document.getElementById("myChart");
	var mixedChart = new Chart(ctx, {
		type: 'line',
		data: {
			datasets: [
				{
					label: 'Entradas (R$)',
					data: [13, 5, 3, 40, 33, 30, 10, 20, 23 ,64, 12, 43],
					// this dataset is drawn below
					order: 1,
					backgroundColor: '#619FCA30',
					borderWidth: 2,
					borderColor:'#619FCA'
				}, 
				{
					label: 'Saídas (R$)',
					data: [33, 30, 10, 20, 24, 23, 65, 33, 30, 23, 10, 20],
					type: 'line',
					// this dataset is drawn on top
					order: 2,
					borderWidth: 2,
					backgroundColor: '#5EBD5E30',
					borderColor:'#5EBD5E'
				},
				{
					label: 'Produtos em estoque (R$)',
					data: [10, 20, 24,5, 10, 32, 60, 1, 23, 65, 33, 30],
					type: 'line',
					// this dataset is drawn on top
					order: 2,
					borderWidth: 2,
					backgroundColor: '#E25A5A30',
					borderColor:'#E25A5A',
					fill: true,
				}
			],
			labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho']
		},
		options: {
			scales: {
				yAxes: [{
						ticks: {
							beginAtZero: false
						}
					}]
			},
			tooltips:{
				enabled: true
			}
		}
	});

</script>