<?php
/*Copyright (c) 2015 Frankie Cancino, Quinton Miller, Trent Broeker, Sydney Bates, Matt Haruza



Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:



The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.



THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.  IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
	include 'include.php';
  include 'fusioncharts.php';
?>
</head>
      <style>
        #chartContainer2,#chartContainer3,#chartContainer4,#chartContainer5,#chartContainer6,#chartContainer7{
          float: left;
        }
       </style>
  		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script type="text/javascript" src="fusioncharts-suite-xt/js/fusioncharts.js"></script>
      <script type="text/javascript" src="fusioncharts-suite-xt/js/themes/fusioncharts.theme.ocean.js"></script>
      <script type="text/javascript">
      FusionCharts.ready(function(){
      var phChart = new FusionCharts({
        "type": "column3d",
        "renderAt": "chartContainer",
        "width": "500",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
          "chart": {
              "caption": "Brew Tracking",
              "subCaption": "PH Levels",
              "xAxisName": "Brew ID",
              "yAxisName": "PH Level",
              "theme": "fint"
           },
          "data": [
              {
                 "label": "1",
                 "value": "5.4"
              },
              {
                 "label": "11",
                 "value": "5.2"
              },
              {
                 "label": "21",
                 "value": "5.2"
              },
              {
                 "label": "31",
                 "value": "5.3"
              },
              {
                 "label": "41",
                 "value": "5.4"
              },
              {
                 "label": "51",
                 "value": "5.5"
              },
              {
                 "label": "61",
                 "value": "5.3"
              },
              {
                  "label": "71",
                  "value": "5.2"
              }
           ]
        }
    });

    phChart.render();
    
    var dateChart = new FusionCharts({
        "type": "vled",
        "renderAt": "chartContainer2",
        "width": "250",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
        "caption": "Brew ID: 1",
        "subcaptionFontBold": "0",
        "lowerLimit": "0",
        "upperLimit": "100",
        "lowerLimitDisplay": "Start",
        "upperLimitDisplay": "Complete",
        "numberSuffix": "%",
        "showValue": "0",
        "showBorder": "0",
        "showShadow": "0",
        "tickMarkDistance": "5",
        "alignCaptionWithCanvas": "1",
        "captionAlignment": "center",
        "bgcolor": "#ffffff"
    },
    "colorRange": {
        "color": [
            {
                "minValue": "0",
                "maxValue": "45",
                "code": "#8e0000"
            },
            {
                "minValue": "45",
                "maxValue": "75",
                "code": "#f2c500"
            },
            {
                "minValue": "75",
                "maxValue": "100",
                "code": "#1aaf5d"
            }
        ]
    },
    "value": "84"
}
        }
    );

    dateChart.render();
    
    var dateChart = new FusionCharts({
        "type": "vled",
        "renderAt": "chartContainer3",
        "width": "250",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
        "caption": "Brew ID: 31",
        "subcaptionFontBold": "0",
        "lowerLimit": "0",
        "upperLimit": "100",
        "lowerLimitDisplay": "Start",
        "upperLimitDisplay": "Complete",
        "numberSuffix": "%",
        "showValue": "0",
        "showBorder": "0",
        "showShadow": "0",
        "tickMarkDistance": "5",
        "alignCaptionWithCanvas": "1",
        "captionAlignment": "center",
        "bgcolor": "#ffffff"
    },
    "colorRange": {
        "color": [
            {
                "minValue": "0",
                "maxValue": "45",
                "code": "#8e0000"
            },
            {
                "minValue": "45",
                "maxValue": "75",
                "code": "#f2c500"
            },
            {
                "minValue": "75",
                "maxValue": "100",
                "code": "#1aaf5d"
            }
        ]
    },
    "value": "94"
}
        }
    );

    dateChart.render();
    var dateChart = new FusionCharts({
        "type": "vled",
        "renderAt": "chartContainer4",
        "width": "250",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
        "caption": "Brew ID: 41",
        "subcaptionFontBold": "0",
        "lowerLimit": "0",
        "upperLimit": "100",
        "lowerLimitDisplay": "Start",
        "upperLimitDisplay": "Complete",
        "numberSuffix": "%",
        "showValue": "0",
        "showBorder": "0",
        "showShadow": "0",
        "tickMarkDistance": "5",
        "alignCaptionWithCanvas": "1",
        "captionAlignment": "center",
        "bgcolor": "#ffffff"
    },
    "colorRange": {
        "color": [
            {
                "minValue": "0",
                "maxValue": "45",
                "code": "#8e0000"
            },
            {
                "minValue": "45",
                "maxValue": "75",
                "code": "#f2c500"
            },
            {
                "minValue": "75",
                "maxValue": "100",
                "code": "#1aaf5d"
            }
        ]
    },
    "value": "94"
}
        }
    );

    dateChart.render();
    var dateChart = new FusionCharts({
        "type": "vled",
        "renderAt": "chartContainer5",
        "width": "250",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
        "caption": "Brew ID: 51",
        "subcaptionFontBold": "0",
        "lowerLimit": "0",
        "upperLimit": "100",
        "lowerLimitDisplay": "Start",
        "upperLimitDisplay": "Complete",
        "numberSuffix": "%",
        "showValue": "0",
        "showBorder": "0",
        "showShadow": "0",
        "tickMarkDistance": "5",
        "alignCaptionWithCanvas": "1",
        "captionAlignment": "center",
        "bgcolor": "#ffffff"
    },
    "colorRange": {
        "color": [
            {
                "minValue": "0",
                "maxValue": "45",
                "code": "#8e0000"
            },
            {
                "minValue": "45",
                "maxValue": "75",
                "code": "#f2c500"
            },
            {
                "minValue": "75",
                "maxValue": "100",
                "code": "#1aaf5d"
            }
        ]
    },
    "value": "35"
}
        }
    );

    dateChart.render();
    var dateChart = new FusionCharts({
        "type": "vled",
        "renderAt": "chartContainer6",
        "width": "250",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
        "caption": "Brew ID: 61",
        "subcaptionFontBold": "0",
        "lowerLimit": "0",
        "upperLimit": "100",
        "lowerLimitDisplay": "Start",
        "upperLimitDisplay": "Complete",
        "numberSuffix": "%",
        "showValue": "0",
        "showBorder": "0",
        "showShadow": "0",
        "tickMarkDistance": "5",
        "alignCaptionWithCanvas": "1",
        "captionAlignment": "center",
        "bgcolor": "#ffffff"
    },
    "colorRange": {
        "color": [
            {
                "minValue": "0",
                "maxValue": "45",
                "code": "#8e0000"
            },
            {
                "minValue": "45",
                "maxValue": "75",
                "code": "#f2c500"
            },
            {
                "minValue": "75",
                "maxValue": "100",
                "code": "#1aaf5d"
            }
        ]
    },
    "value": "43"
}
        }
    );

    dateChart.render();
    
     var dateChart = new FusionCharts({
        "type": "vled",
        "renderAt": "chartContainer7",
        "width": "250",
        "height": "300",
        "dataFormat": "json",
        "dataSource": {
    "chart": {
        "caption": "Brew ID: 71",
        "subcaptionFontBold": "0",
        "lowerLimit": "0",
        "upperLimit": "100",
        "lowerLimitDisplay": "Start",
        "upperLimitDisplay": "Complete",
        "numberSuffix": "%",
        "showValue": "0",
        "showBorder": "0",
        "showShadow": "0",
        "tickMarkDistance": "5",
        "alignCaptionWithCanvas": "1",
        "captionAlignment": "center",
        "bgcolor": "#ffffff"
    },
    "colorRange": {
        "color": [
            {
                "minValue": "0",
                "maxValue": "45",
                "code": "#8e0000"
            },
            {
                "minValue": "45",
                "maxValue": "75",
                "code": "#f2c500"
            },
            {
                "minValue": "75",
                "maxValue": "100",
                "code": "#1aaf5d"
            }
        ]
    },
    "value": "63"
}
        }
    );

    dateChart.render();
   
   })
</script>
</head>
<body>
<div class='row'>
	<div class='col-sm-8'>
		<h3>Track a Brew</h3>
        <div class='table-responsive'>
        	<table class='table'>
            	<tr>
	                <th>ID</th>
	                <th>Name</th>
	                <th>Start Date</th>
					<th>End Date</th>
					<th>Username</th>
	        	</tr> 

<?php
        
    // Query
    $sql = "SELECT * FROM brew ORDER BY end_date ASC, start_date ASC, beer_name ASC;";
    
    // If query is successful
	if ($res = mysqli_query($con, $sql))
	{	
		$count = 0;
		
		// Loop through all rows
		while ($row = mysqli_fetch_array($res))
		{	
			$rowId = $row['brew_id'];
			$rowName = $row['beer_name'];
			$rowStart = $row['start_date'];
			$rowEnd = $row['end_date'];
			$rowUser = $row['user'];
		
            echo "<tr><td>$rowId</td><td>$rowName</td><td>$rowStart</td><td>$rowEnd</td><td>$rowUser</td></tr>";
			$count++;
		}   
	}
        
echo "</table></div></div></div>";
echo "<br><p class='text-center'>Total brews: $count</p><br>";
include 'footer.php';        
?>
  <div id="chartContainer"></div>
  <center><h3>Still Brewing...</h3></center>
  <?php
      for($i = 0; $i < $count; $i++){
        echo "<div id='chartContainer$i'></div>";
      }
      ?>

</body>

