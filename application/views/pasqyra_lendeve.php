<div class="container">
	<div class="col-md-12">
		
			<form action="<?php echo base_url('admin/filter'); ?>" method="POST">
				<br /><br />
				<br /><br />
				<label for="dega" style="font-size:20px;">Dega</label>
				<select class="form-control" style="width:300px;" name="filter">
				<option value="0">Të gjitha degët</option>
					<?php foreach($deget as $dega): ?>
						<option value="<?php echo $dega->ID; ?>"><?php echo $dega->name; ?></option>
					<?php endforeach; ?>
				</select>
				<button class="btn btn-default">Filtro</button>
			</form>

			<h3>Pasqyra e lëndëve për: <?php echo $dega_name; ?></h3>
			<?php foreach($lendet as $lenda): ?>
				<li class="list-group-item"><a href="<?php echo base_url('admin/statistika/'.$lenda->lenda_id); ?>"><?php echo $lenda->Emri; ?></a> <label class="label label-info pull-right"><?php echo $lenda->titulli.' '.$lenda->profi; ?></label></li>
			<?php endforeach; ?>
			
			<br /><br /><br />
			<a class="btn btn-default" href="<?php echo base_url('admin/shto_pytje'); ?>"> Shto pytje te reja</a>

			
		</body>
		</html>
	</div>
</div>