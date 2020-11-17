<?php
    defined('BASEPATH') or exit('No direct script access allowed');
?>
<script src="<?php echo site_url('assets/vendor/chart.js/dist/Chart.min.js'); ?>" type="text/javascript"></script>



<div class="clearfix position-relative pt-2 pb-4">
	<div class="container">
		
		<div class="highlight">

		<div class="row">
			<div class="col-4">
				<div class="card">
					<div class="card-header">Articles Published
						<div class="float-right">
							<select class="form-control form-control-sm">
								<option>Select User</option>
							</select>
						</div>
					</div>
					<div class="card-body">
					<canvas id="articles-published-canvas"></canvas>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
				<div class="card-header">Content Score
					<div class="float-right">
							<select class="form-control form-control-sm">
								<option>Select User</option>
							</select>
					</div>
				</div>
					<div class="card-body">
						chart 2
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
				<div class="card-header">Conversions
					<div class="float-right">
							<select class="form-control form-control-sm">
								<option>Select User</option>
							</select>
					</div>
				</div>
					<div class="card-body">
					<canvas id="conversions-canvas"></canvas>
					</div>
				</div>
			</div>
     	</div> 
		 <div class="row">
			<div class="col-4">
				<div class="card">
				<div class="card-header">Rank Index
					<div class="float-right">
							<select class="form-control form-control-sm">
								<option>Select User</option>
							</select>
					</div>
				</div>
					<div class="card-body">
						chart 4
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
				<div class="card-header">Link Building
					<div class="float-right">
							<select class="form-control form-control-sm">
								<option>Select User</option>
							</select>
					</div>
				</div>
					<div class="card-body">
					<canvas id="link-building-canvas"></canvas>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card">
				<div class="card-header">Traffic
					<div class="float-right">
							<select class="form-control form-control-sm">
								<option>Select Website</option>
							</select>
					</div>
				</div>
					<div class="card-body">
					<canvas id="traffic-canvas"></canvas>
					</div>
				</div>
			</div>
     	</div>     
					
		</div>
		
	</div>
</div>
<script>
	window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};
		var articlesPublishedchartData = {
			labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
			datasets: [{
				type: 'line',
				label: 'Target',
				backgroundColor: window.chartColors.orange,
				borderColor: window.chartColors.orange,
				borderDash: [5, 5],
				borderWidth: 1,
				fill: false,
				data: [
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10
				]
			}, {
				type: 'bar',
				label: 'Articles Published',
				backgroundColor: window.chartColors.blue,
				data: [
					10,
					20,
					8,
					15,
					5,
					12,
					8,
					15,
					5,
					12,
					6,
					10
				],
				borderColor: 'white',
				borderWidth: 2
			}]

		};
		
			var ctx = document.getElementById('articles-published-canvas').getContext('2d');
			window.myMixedChart = new Chart(ctx, {
				type: 'bar',
				data: articlesPublishedchartData,
				options: {
					responsive: true,
					title: {
						display: false,
						text: 'Chart.js Combo Bar Line Chart'
					},
					tooltips: {
						mode: 'index',
						intersect: true
					},
					legend: {
					display: false,
					
					}
				}
			});


			var conversionsChartData = {
			labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
			datasets: [{
				type: 'line',
				label: 'Target',
				backgroundColor: window.chartColors.orange,
				borderColor: window.chartColors.orange,
				borderDash: [5, 5],
				borderWidth: 1,
				fill: false,
				data: [
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10
				]
			}, {
				type: 'bar',
				label: 'Articles Conversion',
				backgroundColor: window.chartColors.green,
				data: [
					10,
					20,
					8,
					15,
					5,
					12,
					8,
					15,
					5,
					12,
					6,
					10
				],
				borderColor: 'white',
				borderWidth: 2
			}]

		};

		var conversions_ctx = document.getElementById('conversions-canvas').getContext('2d');
			window.myMixedChart = new Chart(conversions_ctx, {
				type: 'bar',
				data: conversionsChartData,
				options: {
					responsive: true,
					title: {
						display: false,
						text: 'Chart.js Combo Bar Line Chart'
					},
					tooltips: {
						mode: 'index',
						intersect: true
					},
					legend: {
					display: false,
					
					}
				}
			});


			var linkBuildingChartData = {
			labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
			datasets: [{
				type: 'line',
				label: 'Target',
				backgroundColor: window.chartColors.red,
				borderColor: window.chartColors.red,
				borderDash: [5, 5],
				borderWidth: 1,
				fill: false,
				data: [
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10,
					10
				]
			}, {
				type: 'bar',
				label: 'Articles Published',
				backgroundColor: window.chartColors.orange,
				data: [
					10,
					20,
					8,
					15,
					5,
					12,
					8,
					15,
					5,
					12,
					6,
					10
				],
				borderColor: 'white',
				borderWidth: 2
			}]

		};

		var lb_ctx = document.getElementById('link-building-canvas').getContext('2d');
			window.myMixedChart = new Chart(lb_ctx, {
				type: 'bar',
				data: linkBuildingChartData,
				options: {
					responsive: true,
					title: {
						display: false,
						text: 'Chart.js Combo Bar Line Chart'
					},
					tooltips: {
						mode: 'index',
						intersect: true
					},
					legend: {
					display: false,
					
					}
				}
			});

			var trafficChartData = {
			labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
			datasets: [{
				label: 'Traffic',
				backgroundColor: window.chartColors.orange,
				borderColor: window.chartColors.orange,
				borderDash: [5, 5],
				borderWidth: 1,
				fill: false,
				data: [
					'10 %',
					'20 %',
					'8 %',
					'15 %',
					'5 %',
					'12 %',
					'8 %',
					'15 %',
					'5 %',
					'12 %',
					'6 %',
					'10 %'
				]
			}]

		};

		var t_ctx = document.getElementById('traffic-canvas').getContext('2d');
			window.myMixedChart = new Chart(t_ctx, {
				type: 'line',
				data: trafficChartData,
				options: {
					responsive: true,
					title: {
						display: false,
						text: 'Chart.js Combo Bar Line Chart'
					},
					tooltips: {
						mode: 'index',
						intersect: true
					},
					legend: {
					display: false,
					
					}
				}
			});

		
	</script>