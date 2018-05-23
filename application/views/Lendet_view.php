<div class="container">
	<div class="col-md-12">
		<form method="post" action="<?php echo base_url('Lendet/paraqit_lendet'); ?>">
			<h3 style="display:inline-block; color:#0048e5;" ><?php echo $studenti[0]['Emri'].' '.$studenti[0]['Mbiemri']; ?> </h3> <h3 style="display:inline-block;color:#0048e5; margin-left:40px;" >  Index ID: <?php echo $studenti[0]['ID']; ?></h3>
			<a style="float:right; margin-right:10px; margin-top:21px;" href="<?php echo base_url('login/logout'); ?>">Log Out</a>
			<h4>Lëndët: </h4>
			<ul class="list-group">
				<?php foreach($lendet as $lenda): ?>
					<li class="list-group-item">
						<?php echo $lenda->Emri; ?>
						<div class="pull-right">
							<label for="" class="label label-primary"><?php echo ($lenda->statusi == 0 ? 'E pa vlersuar' : 'E vlersuar'); ?></label>
							<label for="paraqit<?php echo $lenda->ID; ?>">Paraqit: </label> <input type="checkbox" name="lendet[]" id="paraqit<?php echo $lenda->ID; ?>" value="<?php echo $lenda->ID; ?>">
						</div>
					</li>
				<?php endforeach; ?>
				<?php foreach($lendet_pavlersuar as $row): ?>
					<li class="list-group-item">
						<a href="<?php echo base_url('Lendet/get/').'/'.$row->ID; ?>"><?php echo $row->Emri; ?></a> 
						<div class="pull-right">
							<label for="" class="label label-primary">E pa vlersuar</label>
							<label class="label label-info">Duhet vlersuar per ta paraqitur</label>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
			<!-- <div class="alert alert-danger">
				Per te vazhduar duhet vlersuar te gjitha lendet !
			</div> -->
			<button class="btn btn-primary pull-right">Paraqit</button>
		</form>
	</div>
</div>