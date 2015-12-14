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


?>
<html>
	<body>
        <h4>Select a brew to track:</h4>
        <div class="row">
					<div class="col-md-1"></div>
					<form action="<?=$_SERVER['PHP_SELF']?>"method="POST">
						<div class="col-md-2">
							<div class="form-group">
								<select type="text" class="form-control" name="beername" required="yes">
	  								<?php
										//Query
										$sql = "SELECT * FROM beer;";
                                
                                		// If query is successful
                        				if ($res = mysqli_query($con, $sql)){
                        		
                        					// Loop through all rows
                        					while ($row = mysqli_fetch_array($res)){
                                                
                                                $rowTypeId = $row['beer_id'];
                                                $rowType = $row['beer_name'];
                                                echo "<option value='$rowTypeId'>$rowType</option>";
                        					}
                               			}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<input type="text" class="form-control" name="startdate" id="datepicker" required="yes">
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<input type="text" class="form-control" name="enddate" id="datepicker2" required="yes">
							</div>
						</div>
						<div class="col-md-1">
							<div class="form-group">
								<input class="btn btn-info" type="submit" name="submit" value="submit" id="button"/>
							</div>
						</div>
				</form>	
		</div>
        <hr>
		<script type="text/javascript" src="fusioncharts-suite-xt/js/fusioncharts.js"></script>
		<script type="text/javascript" src="fusioncharts-suite-xt/js/themes/fusioncharts.theme.ocean.js"></script>
<?php
	include 'fusioncharts.php';
	$columnChart = new FusionCharts("InverseMSLine", "ex1" , 600, 400, "chart-1", "json", '{  
		   "chart": {
        "caption": "Brew Tracking",
        "subCaption": "Last Week",
        "showBorder": "0",
        "xAxisName": "Day",
        "yAxisName": "Time (In Sec)",
        "numberSuffix": "s",
        "lineThickness": "2",
        "paletteColors": "#008ee4,#6baa01",
        "baseFontColor": "#333333",
        "baseFont": "Helvetica Neue,Arial",
        "captionFontSize": "14",
        "subcaptionFontSize": "14",
        "subcaptionFontBold": "0",
        "bgColor": "#ffffff",
        "showShadow": "0",
        "showLegend": "0",
        "canvasBgColor": "#ffffff",
        "canvasBorderAlpha": "0",
        "divlineAlpha": "100",
        "divlineColor": "#999999",
        "divlineThickness": "1",
        "divLineDashed": "1",
        "divLineDashLen": "1",
        "divLineGapLen": "1",
        "showXAxisLine": "1",
        "xAxisLineThickness": "1",
        "xAxisLineColor": "#999999",
        "showAlternateHGridColor": "0",
        "toolTipColor": "#ffffff",
        "toolTipBorderThickness": "0",
        "toolTipBgColor": "#000000",
        "toolTipBgAlpha": "80",
        "toolTipBorderRadius": "2",
        "toolTipPadding": "5"
    },
    "categories": [
        {
            "category": [
                {
                    "label": "Mon"
                },
                {
                    "label": "Tue"
                },
                {
                    "label": "Wed"
                },
                {
                    "label": "Thu"
                },
                {
                    "label": "Fri"
                },
                {
                    "label": "Sat"
                },
                {
                    "label": "Sun"
                }
            ]
        }
    ],
    "dataset": [
        {
            "seriesname": "Loading Time",
            "allowDrag": "0",
            "data": [
                {
                    "value": "6"
                },
                {
                    "value": "5.8"
                },
                {
                    "value": "5"
                },
                {
                    "value": "4.3"
                },
                {
                    "value": "4.1"
                },
                {
                    "value": "3.8"
                },
                {
                    "value": "3.2"
                }
            ]
        }
    ]
}');
	$columnChart->render();
?>
	<div id="chart-1"></div>
	</body>
</html>