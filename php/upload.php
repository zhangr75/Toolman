<?php

    use Aws\S3\S3Client;
    require './../vendor/autoload.php';
    
    var_dump($_FILES['fileToUpload']);
	if(isset($_FILES['fileToUpload'])){
		$file_name = $_FILES['fileToUpload']['name'];   
		$temp_file_location = $_FILES['fileToUpload']['tmp_name']; 
        var_dump($file_name);
        var_dump($temp_file_location);
	    
		

		$s3 = new S3Client([
			'region'  => 'ca-central-1',
			'version' => 'latest',
			'credentials' => [
				'key'    => "",
				'secret' => "+Ixa1L5VjB15U",
			]
		]);		

		$result = $s3->putObject([
			'Bucket' => 'toolman',
			'Key'    => $file_name,
			'SourceFile' => $temp_file_location			
		]);

        var_dump($result);
        
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