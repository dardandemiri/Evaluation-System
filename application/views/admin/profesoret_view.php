<div class="container">
	<div class="col-md-12">

		<form method="post" action="">

			<h4>Profesorët:</h4>

			<ul class="list-group">
			<?php foreach($profesoret as $prof): ?>
				<li class="list-group-item">

					<a href="<?php echo base_url('Admin/profesori/'.$prof->ID); ?>"><?php echo $prof->Titulli.' '.$prof->Emri;?></a>
					
					<div class="pull-right">
						<label></label>
					</div>

				</li>
			<?php endforeach;?>
			</ul>

			<a href="<?php echo base_url('Admin'); ?>" class="btn btn-primary pull-right">Kthehu mbrapa</a>

		</form>
	</div>
</div>