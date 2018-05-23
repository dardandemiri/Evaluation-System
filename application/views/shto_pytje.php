<!DOCTYPE html>
<html>
<head>
	<title>Shto Pytje</title>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<br /><br /><br /><br />
			<h3>Shkruani pyetjen që dëshironi ta shtoni në databazë:</h3>
			<form method="POST" action=" <?php echo base_url('Admin/add_pyetje'); ?>">
				<input style="width:1000px; font-size:20px;height:35px;"type="text" name="pytja">
				<button class="btn btn-primary">Shto Pytjen</button>
			</form>
			<br /><br />
			<form method="POST" action=" <?php echo base_url('Admin'); ?>">
			<button class="btn btn-default">Kthehu mbrapa</button>
			</form>
		</div>
	</div>
</body>
</html>