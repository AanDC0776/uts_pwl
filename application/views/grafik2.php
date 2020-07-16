<style type="text/css">
	.tab{
		height: 20%;
		width: 100%;
	}
</style>
</style>
	<div class="content-wrapper">
		<div class="tab">
			<canvas id="myChart" width="1000" height="400"></canvas>
				<script>
					var ctx = document.getElementById('myChart').getContext('2d');
					var myChart = new Chart(ctx, {
					    type: 'bar',
					    data: {
					       // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
					       labels:[
					       	<?php 
					       		if(count($isi)>0){
					       			foreach ($isi as $val) {
					       				echo "'".$val['kecamatan']."',";
					       			}
					       		}
					       	 ?>
					       ],
					        datasets: [{
					       		label:'PP',
					       		backgroundColor:'green',
					       		data:[
					       				<?php 
					       		if(count($isi)>0){
					       			foreach ($isi as $val) {
					       				echo $val['pp'].",";
					       			}
					       		}
					       	 ?>
					       		],
					       	},{
					       		label:'ODP',
					       		backgroundColor:'blue',
					       		data:[
					       				<?php 
					       		if(count($isi)>0){
					       			foreach ($isi as $val) {
					       				echo $val['odp'].",";
					       			}
					       		}
					       	 ?>
					       		],
					       	},{
					       		label:'PDP',
					       		backgroundColor:'orange',
					       		data:[
					       			<?php 
					       		if(count($isi)>0){
					       			foreach ($isi as $val) {
					       				echo $val['pdp'].",";
					       			}
					       		}
					       	 ?>
					       		],
					       	},{
					       		label:'OTG',
					       		backgroundColor:'red',
					       		data:[
					       			<?php 
					       		if(count($isi)>0){
					       			foreach ($isi as $val) {
					       				echo $val['otg'].",";
					       			}
					       		}
					       	 ?>
					       		],
					       	},{
					       		label:'POSITIF',
					       		backgroundColor:'black',
					       		data:[
					       			<?php 
					       		if(count($isi)>0){
					       			foreach ($isi as $val) {
					       				echo $val['positif'].",";
					       			}
					       		}
					       	 ?>
					       		]
					    }]
					    },
					    options: {
					        scales: {
					            yAxes: [{
					                ticks: {
					                    beginAtZero: true
					                }
					            }]
					        }
					    }
					});
		</script>
	</div>
</div>
