<!DOCTYPE html>
<html>

	<style>
	
	body 
	{
    background-color: black;
    }
	
	h2 
	{
	font-size: 4.0vw;
	color: white;
	font-family: Verdana, Geneva, sans-serif;
	}
	
	h4 	
	{
	font-size: 3.2vh;
	color: white;
	font-family: Verdana, Geneva, sans-serif;
	}
	</style>

	<meta http-equiv="refresh" content="15" >
	
    <head>
        <title>Vote By Text WordCloud</title>
        <meta charset="UTF-8">
		<script src="d3min.js"></script>
		<script src="d3.layout.cloud.js"></script>
		
		<script type="text/javascript">
		var tags = [
		<?php

		//read DB

		$con=mysqli_connect("localhost","username","password","wordcloud"); //with DB

		//check connection

		if(mysqli_connect_errno())

		echo "Failed to connect to the database!" . mysqli_connect_error();

		//connected to DB 

		//echo "Connected!<br>";

		$max_number = 1;
		
		$result = mysqli_query($con, "SELECT * FROM wordcloud");

		while($row = mysqli_fetch_array($result))
		
		if($row['votes'] > $max_number) $max_number = $row['votes'];
		
		$result = mysqli_query($con, "SELECT * FROM wordcloud");
		
		while($row = mysqli_fetch_array($result))

		echo '{"key": "' . $row['id'] . '. ' . $row['text'] . '", "value": ' . ($row['votes']) . '}, ';
		?>
		
		];
		</script>

		
    </head>
    <body>
		<h2><div style="text-align: center;"><div style="position:absolute;
  top: 3%; left: 0px; right: 0px;">Text to Vote: 682-214-0288</div></div></h2>
		<div id="vis"></div>
   		<div style="text-align: center;"><h4><div style="position:absolute;
  bottom: 3%;  left: 0px; right: 0px;">MattNutsch.com</div></h4></div>
	    <script type="text/javascript" src="word-cloud.js"></script>
	

	</body>
</html>
