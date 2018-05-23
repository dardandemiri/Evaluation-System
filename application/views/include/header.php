<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<link rel="stylesheet" href="<?php echo base_url('style/main_style.css'); ?>">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="<?php echo base_url('JS/jquery.js'); ?>"></script>
	<script>
		$(document).ready(function(){
			// alert();
			$('#forma_pyetjeve').submit(function(event){
				var len = $('#total_answers').val();
				
				var check = 0;
				// alert(len);
				for (var i = 0; i <= len; i++) {

					if( $('input[name=vlersimi'+i+']:checked').val() >= 0 )
					{
						
					}else{
						// alert($('input[name=vlersimi'+i+']:checked').val());
						// alert();
						$('.alert').fadeIn('slow');
						event.preventDefault();
					}
					check++;
				};
				if(check == len)
				{
					$('#forma_pyetjeve').submit();
				}
			});
		});
	</script>
</head>
<body>
