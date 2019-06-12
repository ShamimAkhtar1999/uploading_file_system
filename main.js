// JavaScript Document
$('document').ready(function(){
	//alert('this is js');
		$('#form1').submit(function(e)
		{
			e.preventDefault();
			$.ajax({
					url : "upload-image-controller.php",
					type: "POST",
					data: new FormData(this),
					contentType : false,
					dataType : "html",
					cache : false,
					processData : false,
					success : function(response){
							//alert(response);
							$('.image_info').empty();
							$('.image_info').html(response);
							this.trigger('reset');
						}
					
				});
				/*console.log(new FormData(this));
				$.post("upload-image-controller.php",new FormData(this),(response)=>
				{
					alert(response);
				});*/
				
		});
		$('#image_name').change(function()
		{
			let file = this.files[0];
			let file_type = file.type;
                        let file_size = file.size;
                        if (file_size > 1000000){
                            $('.image_info').html("<p> It is too long file please choose less then 1 mb</p>").css("color", "red");
                            return true;
                        }
                        console.log(file_size);
			let file_allow = ["image/jpg", "image/jpeg","image/png"];
			
			if (!((file_type == file_allow[0]) || (file_type == file_allow[1]) || (file_type == file_allow[2])))
			{
				$('.image_info').html("<p> please choose correct file type only (jpg , png, jpeg)</p>").css("color", "red");
                                return true;
			}
			else
			{
				let reader = new FileReader();
				reader.onload = imageIsLoaded;
				reader.readAsDataURL(this.files[0]);
			}
			function imageIsLoaded(e) 
			{
				$('.image_preview').empty();
				$('.image_preview').css("background","url("+e.target.result+")");
				$('.image_preview').css("background-size","cover");
			}
			//console.log(readAsDataURl(this.files[0]));
		});
		
	});