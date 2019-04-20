<?php
    session_start();
    require "adminheader.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>iTrack</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
</head>
<style>
   


</style>

<body>
<div class="container">
    <div class="row my-3">
        <div class="col">
            <h4 class="text-center"> Feedback Dashboard</h4>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md-6 py-1">
            <div class="card">
				<div class="card-header">
					Survey Count
				</div>
                <div class="card-body">
                    <canvas id="chLine"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6 py-1">
            <div class="card">
				<div class="card-header">
					Total Count
				</div>
                <div class="card-body">
                    <canvas id="chBar"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row py-2">
        <div class="col-md-4 py-1">
            <div class="card">
				<div class="card-header">
						Process
				</div>
                <div class="card-body">
                    <canvas id="chDonut1"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 py-1">
            <div class="card">
				<div class="card-header">
						Accomodation
				</div>
                <div class="card-body">
                    <canvas id="chDonut2"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4 py-1">
            <div class="card">
				<div class="card-header">
						Service
				</div>
                <div class="card-body">
                    <canvas id="chDonut3"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/Chart.bundle.min.js"></script>
    <script src="js/utils.js"></script>
    <script>
	$(document).ready(function(){
		$.ajax({
			type: "POST",
			url: "ajax/feedback.graph.php",
			dataType: 'json',
			success: function(response){
				console.log(response);
				let process = response.process;
				donut1.data.datasets[0].data = [process.napakahusay, process.mahusay, process.hindimahusay ,process.nangangailangan];
				donut1.update();

				let accomodation = response.accomodation;
				donut2.data.datasets[0].data = [accomodation.napakahusay, accomodation.mahusay, accomodation.hindimahusay ,accomodation.nangangailangan];
				donut2.update();

				let service = response.service;
				donut3.data.datasets[0].data = [service.napakahusay, service.mahusay, service.hindimahusay ,service.nangangailangan];
				donut3.update();

				totalNapakahusay = parseInt(service.napakahusay) + parseInt(accomodation.napakahusay) + parseInt(process.napakahusay);
				totalMahusay = parseInt(service.mahusay) + parseInt(accomodation.mahusay) + parseInt(process.mahusay);
				totalHindiMahusay = parseInt(service.hindimahusay) + parseInt(accomodation.hindimahusay) + parseInt(process.hindimahusay);
				totalNangangailangan  = parseInt(service.nangangailangan) + parseInt(accomodation.nangangailangan) + parseInt(process.nangangailangan)
				bar.data.datasets[0].data = [totalNapakahusay, totalMahusay, totalHindiMahusay ,totalNangangailangan];
				bar.update();

				let recordCount = response.date;
				let dayPerWeek = [ recordCount.Monday|| 0, recordCount.Tuesday || 0, recordCount.Wednesday|| 0, recordCount.Thursday|| 0,recordCount.Friday|| 0, recordCount.Saturday|| 0, recordCount.Sunday|| 0 ];
				console.log(dayPerWeek);
				line.data.datasets[0].data = dayPerWeek;
				line.update();
				
				
			}
		});
		var colors = ['#4CAF50','#FBC02D','#FF9800','#FF5722','#dc3545','#6c757d'];

			/* large line chart */
			var chLine = document.getElementById("chLine");
			var chartData = {
			labels: ["M", "T", "W", "T", "F", "S", "S"],
			datasets: [{
				data: [0, 0, 0, 0, 0, 0, 0],
				backgroundColor: colors[1],
				borderColor: colors[0],
				borderWidth: 4,
				pointBackgroundColor: colors[1]
			}]
			};
			if (chLine) {
			var line = new Chart(chLine, {
			type: 'line',
			data: chartData,
			options: {
				scales: {
				yAxes: [{
					ticks: {
					beginAtZero: false
					}
				}]
				},
				legend: {
				display: false
				},
				responsive: true
			}
			});
			}


			/* bar chart */
			var chBar = document.getElementById("chBar");
			if (chBar) {
			var bar = new Chart(chBar, {
			type: 'bar',
			data: {
				labels: ['napakahusay', 'mahusay', 'hindimahusay', 'nangangailangan'],				
				datasets: [{
				data: [0,0,0,0],
				backgroundColor: colors[0]
				}]
			},
			options: {
				legend: {
				display: false
				},
				scales: {
				xAxes: [{
					barPercentage: 0.4,
					categoryPercentage: 0.5,

				}],
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
				}
			}
			});
			}

			/* 3 donut charts */
			var donutOptions = {
			cutoutPercentage: 85, 
			legend: {position:'bottom', padding:5, labels: {pointStyle:'circle', usePointStyle:true}}
			};

			// donut 1
			var chDonutData1 = {
				labels: ['napakahusay', 'mahusay', 'hindimahusay', 'nangangailangan'],
				datasets: [
				{
					backgroundColor: colors.slice(0,4),
					borderWidth: 0,
					data: [0, 0, 0, 0]
				}
				]
			};

			var chDonut1 = document.getElementById("chDonut1");
			if (chDonut1) {
			var donut1 = new Chart(chDonut1, {
				type: 'pie',
				data: chDonutData1,
				options: donutOptions
			});
			}

			// donut 2
			var chDonutData2 = {
				labels: ['napakahusay', 'mahusay', 'hindimahusay', 'nangangailangan'],				
				datasets: [
				{
					backgroundColor: colors.slice(0,4),
					borderWidth: 0,
					data: [0, 0, 0, 0]
				}
				]
			};
			var chDonut2 = document.getElementById("chDonut2");
			if (chDonut2) {
			var donut2 = new Chart(chDonut2, {
				type: 'pie',
				data: chDonutData2,
				options: donutOptions
			});
			}

			// donut 3
			var chDonutData3 = {
				labels: ['napakahusay', 'mahusay', 'hindimahusay', 'nangangailangan'],
				datasets: [
				{
					backgroundColor: colors.slice(0,4),
					borderWidth: 0,
					data: [0, 0, 0, 0]
				}
				]
			};
			var chDonut3 = document.getElementById("chDonut3");
			if (chDonut3) {
			var donut3 = new Chart(chDonut3, {
				type: 'pie',
				data: chDonutData3,
				options: donutOptions
			});
			}

			/* 3 line charts */
			var lineOptions = {
				legend:{display:false},
				tooltips:{interest:false,bodyFontSize:11,titleFontSize:11},
				scales:{
					xAxes:[
						{
							ticks:{
								display:false
							},
							gridLines: {
								display:false,
								drawBorder:false
							}
						}
					],
					yAxes:[{display:false}]
				},
				layout: {
					padding: {
						left: 6,
						right: 6,
						top: 4,
						bottom: 6
					}
				}
			};

			var chLine1 = document.getElementById("chLine1");
			if (chLine1) {
			new Chart(chLine1, {
				type: 'line',
				data: {
					labels: ['Jan','Feb','Mar','Apr','May'],
					datasets: [
						{
						backgroundColor:'#ffffff',
						borderColor:'#ffffff',
						data: [10, 11, 4, 11, 4],
						fill: false
						}
					]
				},
				options: lineOptions
			});
			}
			var chLine2 = document.getElementById("chLine2");
			if (chLine2) {
			new Chart(chLine2, {
				type: 'line',
				data: {
					labels: ['A','B','C','D','E'],
					datasets: [
						{
						backgroundColor:'#ffffff',
						borderColor:'#ffffff',
						data: [4, 5, 7, 13, 12],
						fill: false
						}
					]
				},
				options: lineOptions
			});
			}

			var chLine3 = document.getElementById("chLine3");
			if (chLine3) {
			new Chart(chLine3, {
				type: 'line',
				data: {
					labels: ['Pos','Neg','Nue','Other','Unknown'],
					datasets: [
						{
						backgroundColor:'#ffffff',
						borderColor:'#ffffff',
						data: [13, 15, 10, 9, 14],
						fill: false
						}
					]
				},
				options: lineOptions
			});
			}
	});
	</script>
</body>

</html>
