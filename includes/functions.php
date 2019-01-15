<?php

date_default_timezone_set('America/Los_Angeles');
//define('URL', 'https://onthegowithjando.com');
define('URL', 'http://onthego.local');

function getUser($id)
{
	include 'env.php';

	$sql = "SELECT * FROM users WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_array($result)) 
	{
		return $row['user_name'];
	}
}

function image_fix_orientation($filename) {
    $exif = exif_read_data($filename);
    if (!empty($exif['Orientation'])) {
        $image = imagecreatefromjpeg($filename);
        switch ($exif['Orientation']) {
            case 3:
                $image = imagerotate($image, 180, 0);
                break;

            case 6:
                $image = imagerotate($image, -90, 0);
                break;

            case 8:
                $image = imagerotate($image, 90, 0);
                break;
        }

        imagejpeg($image, $filename, 90);
    }
}

function get(string $sql)
{
	include('env.php');
	$result = mysqli_query($conn, $sql);

	return $result;
}

function dd($var)
{
	var_dump($var);
	die;
}

function rand_str($length = 8, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890') 
{
	$chars_length = (strlen($chars) - 1); // Length of character list
	$string = $chars{rand(0, $chars_length)}; // Start our string
	for ($i = 1; $i < $length; $i = strlen($string)) { // Generate random string
		$r = $chars{rand(0, $chars_length)}; // Grab a random character from our list
		$string .=  $r; // Make sure the same two characters don’t appear next to each other
	}

	return $string;
}

//escapes all foreign characters from user's input
function escape($str)
{
	$search=array("\\","\0","\n","\r","\x1a","'",'"');
	$replace=array("\\\\","\\0","\\n","\\r","\Z","\'",'\"');
	return str_replace($search,$replace,$str);
}

function uploadAttachment($target_file, $fileToUpload)
{
	$uploadOk = 1;
	$return = '';
	$uploadedFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($fileToUpload["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$return .= "File is not an image. ";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		$return .= "File name already exists. ";
		$uploadOk = 0;
	} 
	
	// Check file size
	if ($fileToUpload["size"] > 50000000) {
		$return .= "Your file is too large. ";
		$uploadOk = 0;
	}

	$uploadedFileType = strtolower($uploadedFileType);
	
	// Allow image file formats
	if($uploadedFileType != "jpg" && $uploadedFileType != "png" && $uploadedFileType != "jpeg" && $uploadedFileType != "gif") {
		$return .= "Only JPG, JPEG, PNG & GIF files are allowed. ";
		$uploadOk = 0;
	}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$return .= "Sorry, your file was not uploaded. ";
	// if everything is ok, try to upload file
	} else {
		image_fix_orientation($fileToUpload["tmp_name"]);
		
		if (!move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {
			$return .= "Sorry, there was an error uploading your file. ";
		} else {
			$return = 'success';
		}
	}
	
	return $return;
}


?>