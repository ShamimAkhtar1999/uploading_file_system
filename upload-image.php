<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Upload Image</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="main.js"></script>

</head>

<body>
<div class="mid_div" id="mid_div">
  <fieldset>
<legend>Upload Image</legend>
    
    <form id="form1" name="form1" method="post" action="upload-image-controller.php" enctype="multipart/form-data">
      <div class="image_preview">image_preview</div>
      <div class="appli_info">
      	 <p>
          <label for="image_name">Choose your image:</label>
          <input name="image" type="file"  id="image_name">
        </p>
        <p>
          <label for="name">Applicant_name:</label>
          <input name="name" type="text" autofocus required="required" id="name">
        </p>
        <p>
          <label for="dob">Date Of Birth:</label>
          <input name="dob" type="date" required="required" id="dob">
        </p>
        <p>
          <input type="submit" name="submit" id="submit" value="Submit">
          <input type="reset" name="reset" id="reset" value="Reset">
        </p>
      </div>
     </form>
      <div class="image_info">
		image info will here 
	</div>
  </fieldset>
</div>

</body>
</html>