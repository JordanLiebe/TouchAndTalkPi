<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="jquery.js" type="text/javascript"></script>
	
	</head>
	<body>
		<div id="main">

<?php
//owner pw sound1 words1 pic1
	$owner = "0014";

	?>
	
	<script>
	function updateWords(num)
	{
		
		var wds = "words"+num;
		var fl = "#uploadedfile"+num;
		var words = document.getElementById(wds).value;
		//var filer = document.getElementById(fl).files[0];
		var size = document.getElementById("MAX_FILE_SIZE").value;
		
		var file_data = $(fl).prop('files')[0];   
    		var form_data = new FormData();                  
    		form_data.append('file', file_data);
		
		form_data.append('owner', "<?php echo $owner; ?>");
		form_data.append('words', words);
		form_data.append('number', num);
		form_data.append('MAX_FILE_SIZE', size);
		                                 
		    $.ajax({
		                url: 'upload.php', // point to server-side PHP script 
		                dataType: 'text',  // what to expect back from the PHP script, if anything
		                cache: false,
		                contentType: false,
		                processData: false,
		                data: form_data,                         
		                type: 'post',
		                success: function(php_script_response){
		                    document.getElementById("info").innerHTML = php_script_response; // display response from the PHP script, if any
		                }
		     });
		
		//document.getElementById("info").innerHTML += "From main- Owner = <?php echo $owner; ?>";
	}
	</script>
	
        <div id="info" style="position:fixed;top:50px;left:40%;"></div>
        <input type="hidden" id="MAX_FILE_SIZE" value="1000">
        <div id="outer">
          <div id="first">
            Update first entry words: <input id="words1" required>
            Choose sound to upload (must be mp3): <input id="uploadedfile1"  type="file">
            <button onclick="updateWords(1)">Update</button>
          </div>
          <div id="second">
            Update second entry words: <input id="words2" required>
            Choose sound to upload (must be mp3): <input id="uploadedfile2"  type="file">
            <button onclick="updateWords(2)">Update</button>
          </div>
          <div id="third">
            Update third entry words: <input id="words3" required>
            Choose sound to upload (must be mp3): <input id="uploadedfile3"  type="file">
            <button onclick="updateWords(3)">Update</button>
          </div>
          <div id="fourth">
            Update fourth entry words: <input id="words4" required>
            Choose sound to upload (must be mp3): <input id="uploadedfile4"  type="file">
            <button onclick="updateWords(4)">Update</button>
          </div>

        </div>
			</div>
	</body>
</html>
	<?php
mysqli_close($dbc);
?>
