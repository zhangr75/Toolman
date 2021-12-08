<?php

    use Aws\S3\S3Client;
    require './../vendor/autoload.php';
    
    
	if(isset($_FILES['fileToUpload'])){
		$file_name = $_FILES['fileToUpload']['name'];   
		$temp_file_location = $_FILES['fileToUpload']['tmp_name']; 
        
        //var_dump($_FILES['fileToUpload']);
        //var_dump($file_name);
        //var_dump($temp_file_location);
	    
		

		// $s3 = S3Client::factory([
		// 	'region'  => 'ca-central-1',
		// 	'version' => 'latest',
		// 	'credentials' => [
		// 		'key'    => "AKIA5LWSVAHKAM7T7DHW",
		// 		'secret' => "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",
		// 	]
		// ]);		

		// $result = $s3->putObject([
		// 	'Bucket' => 'toolman',
		// 	'Key'    => $file_name,
		// 	'SourceFile' => $temp_file_location			
		// ]);
        $imageUrl = 'https://toolman.s3.ca-central-1.amazonaws.com/' . $file_name;
        echo $file_name;
        echo "<br>" . $temp_file_location;
        echo "<br>" . $imageUrl . "<br>";
        var_dump($_FILES['fileToUpload']);
        //var_dump($result);
        
	}

?>


<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>