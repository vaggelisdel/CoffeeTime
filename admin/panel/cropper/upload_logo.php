<?php
  
  	if($_POST["action"] == "UploadLogo")
	{
		$url = $_POST['getimageurl'];
		$fileName = $_POST['getimagename'];
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));
		$fileNameNew = uniqid('', true).".".$fileActualExt;
		$fileDestination = '../../../../coffeetime/images/'.$fileNameNew;
		copy($url, $fileDestination);
	}