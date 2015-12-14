<?php
	/*
	 * brewCalendar.php
	 *
	 * Description: Displays the brew schedules on a calendar.
	 * Authors:     Quinton D Miller
	 *
	 */	 	
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

    <div data-role="page" id="index">
		<h1>Brew Calendar</h1>
        
        <div data-role="content">       
            <div id='calendar' style="width:100%;"></div>
        </div>
    
    </div>
	<script>
		

	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		$('#calendar').fullCalendar({
			theme: true,
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			events: [
<?php
				// Query
				$sql = "SELECT * FROM brew WHERE start_date IS NOT NULL AND end_date IS NOT NULL";
				
				// Execute query and loop through results
				if ($res = mysqli_query($con, $sql)){
					
					while ($row = mysqli_fetch_array($res)){
						
						$rowBeerName = $row['beer_name'];
						$rowStartDate = date("Y, n - 1, d, H, i, s", strtotime($row['start_date']));
						$rowEndDate = date("Y, n - 1, d, H, i, s", strtotime($row['end_date']));
						
						echo "{title: '$rowBeerName', start: new Date($rowStartDate), end: new Date($rowEndDate)},\n";
						
					}
					
				}
				else{
					
					redirect2("Error with query: $sql");
					
				}	
?>
			]
		});
		
	});

	</script>
	<br><br>