<?php

    function replaceAll($text){
        $text=strtolower(htmlentities($text));
        //$text=str_replace(get_html_translation_table(),"-", $text);
        $text=str_replace(" ","-",$text);
        //$text= reg_replace("/[-]+/i","-",$text);
        return $text;
    }
    
  function seperate($text, $type){
    $array = explode('.', $text);
    if ($type == "file"){return $array[0];}
    if ($type == "type"){return $array[1];}
  }
  
  function checkType($text){
    $type = seperate($text, "type");
    if ($type == "mp3"){return "sound";}
    else {return "none";}
  }
    //echo "test";
    $words = $_POST['words'];
    $size = $_POST['MAX_FILE_SIZE'];
    $owner = $_POST['owner'];
    $num = $_POST['number'];
    $filer = $_POST['file'];
    
    if ($_POST['words'] != "")
    {
        if ($_POST['MAX_FILE_SIZE'] == "1000")
        {
            // Where the file is going to be placed
            $target_path = "sounds/";
            $fileName = $owner."-".$num.".mp3";
            $newFileName = replaceAll(basename( $_FILES['file']['name']));  //gets rid of spaces
            $type = checkType($newFileName);  //get the file type (returning none if not accepted)
            
            if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path.$fileName) AND $type != "none")
            {
                echo "The file ".$fileName." has been uploaded <br>";

                $sql = "UPDATE touchntalkpro SET words".$num." = '".$words."' WHERE owner = '".$owner."'";
                echo "The file ".$newFileName." has been uploaded <br>";
                try{
                    $dbc = new PDO('sqlite:/home/pi/temp/main.db');
                }
                catch(PDOException $e){
                    echo $e->getMessage();
                }
                $err = $dbc->query($sql);
            } 
            elseif ($type == "none")
            {
                echo "You did not use the allowed file type (MP3)<br>";
            }
            else
            {
                echo "There was an error uploading the file, please try again!<br>";
            }
        }
        else
        {
            echo "Don't know how you got here... <br>";
        }
    }
    else
    {
        echo "You did not enter a words, please go back and try again";
    }
?>
