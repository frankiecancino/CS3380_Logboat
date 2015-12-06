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
		<script type="text/javascript" src="fusioncharts-suite-xt/js/fusioncharts.js"></script>
		<script type="text/javascript" src="fusioncharts-suite-xt/js/themes/fusioncharts.theme.ocean.js"></script>

<?php
	include 'fusioncharts.php';
	$columnChart = new FusionCharts("column3d", "ex1" , 600, 400, "chart-1", "json", '{  
		   "chart":{  
			  "caption":"Logboat\'s Reports",
			  "subCaption":"Top 5 brews in the last month by revenue",
			  "numberPrefix":"$",
			  "theme":"ocean"
		   },
		   "data":[  
			  {  
				 "label":"Shiphead",
				 "value":"880000"
			  },
			  {  
				 "label":"Mamoot",
				 "value":"730000"
			  },
			  {  
				 "label":"Snapper",
				 "value":"590000"
			  },
			  {  
				 "label":"Lookout",
				 "value":"520000"
			  },
			  {  
				 "label":"Bear Hair",
				 "value":"330000"
			  }
		   ]
		}');
	$columnChart->render();
?>
	<div id="chart-1"></div>
	</body>
</html>
