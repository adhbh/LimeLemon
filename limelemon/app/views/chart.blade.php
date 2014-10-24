<!DOCTYPE html>
<html>
<head>
    <title>LimeLemon</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<script src="https://rawgit.com/nnnick/Chart.js/master/Chart.js"></script>
	
</head>
<body>
<div class="container">


<h1>Price Chart</h1>



<div style="width: 50%">
			<canvas id="canvas" height="450" width="600"></canvas>
		</div>


	<script>
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var barChartData = {
		labels : ["{{ $product[0]->name }}","{{ $product[1]->name }}","{{ $product[2]->name }}","{{ $product[3]->name }}"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [{{ $product[0]->base_price }},{{ $product[1]->base_price }},{{ $product[2]->base_price }},{{ $product[3]->base_price }}]
			}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}

	</script>
	
<?php echo $product->links(); ?>
</div>
</body>
</html>