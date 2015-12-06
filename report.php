<?php
	if(!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) {
		$url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header('Location: ' . $url);
		//exit;
	}
	include 'include.php';
?>
<html>
	<body>
		<meta charset="utf-8">
  		<title>jQuery UI Datepicker - Default functionality</title>
  		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  		<link rel="stylesheet" href="/resources/demos/style.css">
  		<script>
  		$(function() {
    		$( "#datepicker" ).datepicker();
  		});
		$(function() {
    		$( "#datepicker2" ).datepicker();
  		});
  		</script>
		  
		<div class="container">
			<h3>Reports</h3>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<h5>Start Date:</h5>
				</div>
				<h5>End Date:</h5>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<form action="<?=$_SERVER['PHP_SELF']?>"method="POST">
					<div class="col-md-2">
							<div class="form-group">
								<input type="text" class="form-control" name="filldate" id="datepicker">
							</div>
					</div>
					<div class="col-md-2">
							<div class="form-group">
								<input type="text" class="form-control" name="filldate" id="datepicker2">
							</div>
					</div>
					<div class="col-md-1">
							<div class="form-group">
								<input class="btn btn-info" type="submit" name="submit" value="submit" id="button"/>
							</div>
					</div>
				</form>	
			</div>
		<script src="Chart.js"></script>
		<script type="text/javascript" src="fusioncharts-suite-xt/js/fusioncharts.js"></script>
		<script type="text/javascript" src="fusioncharts-suite-xt/js/themes/fusioncharts.theme.ocean.js"></script>
<?php
	include 'includes/fusioncharts.php';
	$columnChart = new FusionCharts("column2d", "ex1" , 600, 400, "chart-1", "json", '{  
		   "chart":{  
			  "caption":"Harry\'s SuperMart",
			  "subCaption":"Top 5 stores in last month by revenue",
			  "numberPrefix":"$",
			  "theme":"ocean"
		   },
		   "data":[  
			  {  
				 "label":"Bakersfield Central",
				 "value":"880000"
			  },
			  {  
				 "label":"Garden Groove harbour",
				 "value":"730000"
			  },
			  {  
				 "label":"Los Angeles Topanga",
				 "value":"590000"
			  },
			  {  
				 "label":"Compton-Rancho Dom",
				 "value":"520000"
			  },
			  {  
				 "label":"Daly City Serramonte",
				 "value":"330000"
			  }
		   ]
		}');
	$columnChart->render();
?>
	</body>
</html>
