<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../style.css">
		<script src="../jquery.js"></script>
	</head>
	<body>
		<div id="main">

<?php
  $owner = "0014';
  $err = 0;
	if ($owner == "0014"){
		$sql = "Select * From touchntalkpro Where owner = '".$owner."'";
		try{
			$dbc = new PDO('sqlite:/home/pi/temp/main.db');
		}
			catch(PDOException $e)
    {
			echo $e->getMessage();
      $err = 1;
		}
		if($err == 0)
		{   
			foreach ($dbc->query($sql) as $row)
			{
				$id = $row['id'];
				//$teacherABC = $row['teacher']; 
				$owner = $row['owner'];
				echo '<div style="position:fixed;top:5px;left:5px;">id = ' . $id . " owner = " . $owner . "</div>";
				echo '<div id="first" class="sounds" onclick="playing(1)">';
					echo $row['words1'];
				echo '</div>';
				echo '<div id="second" class="sounds" onclick="playing(2)">';
					echo $row['words2'];
				echo '</div>';
				echo '<div id="third" class="sounds" onclick="playing(3)">';
					echo $row['words3'];
				echo '</div>';
				echo '<div id="fourth" class="sounds" onclick="playing(4)">';
					echo $row['words4'];
				echo '</div>';
				
				
				echo '<script>';
					echo '$(document).keydown(function(e){ ';//up
					    echo 'if (e.keyCode == 38 ) { ';
					      echo 'playing(1); '; 
					      echo '}  ';        
					echo '}); ';
					echo '$(document).keydown(function(e){ ';//down
					    echo 'if (e.keyCode == 40 ) { ';
					      echo 'playing(2); ';  
					      echo '} ';        
					echo '}); ';
					echo '$(document).keydown(function(e){ ';//right
					    echo 'if (e.keyCode == 39 ) { ';
					      echo 'playing(4); '; 
					      echo '} ';
					echo '}); ';
					echo '$(document).keydown(function(e){ ';//left
					    echo 'if (e.keyCode == 37 ) { ';
					      echo 'playing(3); ';
					      echo '} ';
					echo '}); ';
					echo 'function playing(num) { ';
						echo "if (num == 1){ ";
							echo 'var audio = new Audio("../sounds/'.$owner.'-1.mp3");';
							echo 'audio.play();';
						echo ' }';
						echo "else if (num == 2){ ";
							echo 'var audio = new Audio("../sounds/'.$owner.'-2.mp3");';
							echo 'audio.play();';
						echo ' }';
						echo "else if (num == 3){ ";
							echo 'var audio = new Audio("../sounds/'.$owner.'-3.mp3");';
							echo 'audio.play();';
						echo ' }';
						echo "else if (num == 4){ ";
							echo 'var audio = new Audio("../sounds/'.$owner.'-4.mp3");';
							echo 'audio.play();';
						echo ' }';
						
					echo ' }';
				echo '</script>';
			}
	
		}
		else
		{
			echo '<p>'.mysqli_error($dbc).'</p>';
			echo 'Query issue';
		}
	}
	else {
		echo "You might have come to this page my mistake, if you believe you are in the correct spot please ask your teacher for the correct URL";
	
	}
?>
      </div>
	</body>
</html>
