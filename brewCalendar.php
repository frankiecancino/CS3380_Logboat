<?php
	/*
	 * brewCalendar.php
	 *
	 * Description: Displays the brew schedules on a calendar.
	 * Authors:     Quinton D Miller
	 *
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