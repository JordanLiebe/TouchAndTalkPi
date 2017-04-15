<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	
	</head>
	<body>
		<div id="main">

<?php
	//echo "Main Page";
	?>
	<div style="text-align:center;">
		<h2><a href="manager">Manager Site</a></h2><br><br>
		Or enter id for student: <input id="num"><button id="btn">Go</button>
	</div>
	<script>
		document.getElementById("btn").addEventListener("click",go);
		function go() {
			var num = document.getElementById("num").value;
      var num = "0014";
			window.location.href = 'talk?id='+num;
		}
	
	</script>
	
	    </div>
	</body>
</html>
