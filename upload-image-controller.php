<?php
	if($_SERVER["REQUEST_METHOD"] === "POST")
	{
		$image = $_FILES['image']['name'];
		//var_dump($image);
		$imagetmpname = $_FILES['image']['tmp_name'];
		$name = $_POST['name'];
		$dob = $_POST['dob'];
		$file_extn = strtolower(pathinfo($image,PATHINFO_EXTENSION));
		$allowfile = array("jpg" , "jpeg", "png");
		
		$target = $_SERVER['DOCUMENT_ROOT']."/myajax_file/upload-image-php-ajax/uploading-image/upload-image/";
		$new_target = $target."{$_SERVER['REQUEST_TIME_FLOAT']}.{$file_extn}";
		$fileNewName = "{$_SERVER['REQUEST_TIME_FLOAT']}.{$file_extn}";
		
		$conn = "";
		$query = "";
		
		if (!in_array($file_extn ,$allowfile))
		{
			die("please choose correct file");
		}
		else if(move_uploaded_file($imagetmpname , $new_target))
		{	
			$conn = new mysqli("localhost", "root", "", "ajax_php");
			$query = "INSERT INTO image_upload(image, applicant_name, dob)
					VALUES ('{$fileNewName}', '{$name}','{$dob}')";
					if ($conn->query($query))
					{
						echo "<span class='success'>file is uploaded successfuly</span> <br/>";
						echo "File name is = {$fileNewName}/{$name} <br/>";
						echo "Date of Birth = {$dob} </br>" ;
						echo "file size = ".($_FILES['image']['size']/1024)."kb";	
					}
					else
					{
						die("there is some problem to connect with database");
					}
			
		}
		else
		{
			die("file is not uploaded please try again");
		}
		
		
	}
?>