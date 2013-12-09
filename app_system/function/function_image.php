<?
if ($tag_for_code == "hide" ){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
}//////if ($tag_for_code == "hide" ){
	


//IMAGE RESIZE FUNCTION FOLLOW ABOVE DIRECTIONS 
function function_picture_makeimage($filename, $newfilename, $path, $newwidth, $newheight) { 

    //SEARCHES IMAGE NAME STRING TO SELECT EXTENSION (EVERYTHING AFTER . ) 
    $image_type = strstr($filename,  '.'); 

    //SWITCHES THE IMAGE CREATE FUNCTION BASED ON FILE EXTENSION 
        switch($image_type) { 
          
			case '.jpg': 
                $source = imagecreatefromjpeg($path.$filename); 
                break; 
            case '.png': 
                $source = imagecreatefrompng($path.$filename); 
                break; 
            case '.gif': 
                $source = imagecreatefromgif($path.$filename); 
                break; 
            default: 
                echo("Error Invalid Image Type"); 
                die; 
                break; 
            } 
     
    //CREATES THE NAME OF THE SAVED FILE 
    $file = $newfilename . $filename; 
     
    //CREATES THE PATH TO THE SAVED FILE 
    $fullpath = $path . $file; 

    //FINDS SIZE OF THE OLD FILE 
    list($width,  $height) = getimagesize($path.$filename); 

    //CREATES IMAGE WITH NEW SIZES 
    $thumb = imagecreatetruecolor($newwidth,  $newheight); 

    //RESIZES OLD IMAGE TO NEW SIZES 
    imagecopyresized($thumb,  $source,  0,  0,  0,  0,  $newwidth,  $newheight,  $width,  $height); 

    //SAVES IMAGE AND SETS QUALITY || NUMERICAL VALUE = QUALITY ON SCALE OF 1-100 
    imagejpeg($thumb,  $fullpath,  60); 

    //CREATING FILENAME TO WRITE TO DATABSE 
    $filepath = $fullpath; 
     
    //RETURNS FULL FILEPATH OF IMAGE ENDS FUNCTION 
    return $filepath; 

} 


?>