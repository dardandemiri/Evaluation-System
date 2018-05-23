<div class="container">
	<div class="col-md-6">
		<h3><?php echo $profi[0]['lenda']; ?> - <?php echo $profi[0]['Emri']; ?></h3>
		<ul class="list-group">
		<?php 
			$shuma = 0;
			$counter = 0;
			$pergjigjet = count($pytjet);
			$loop = $pergjigjet / $pytjetc;
			$mbledhes = 0;
			$teMbledhurat = 0;
			if($pergjigjet != 0){
				for ($i=0; $i < $pytjetc; $i++) {  //3 her
					for ($j=0; $j < $loop; $j++) {  //2 her
						$teMbledhurat = $teMbledhurat + $pytjet[$mbledhes]['nota_pytjes']; //
						$mbledhes++;
					}
					echo '<li class="list-group-item">'.$pytjet[$mbledhes-1]['pytja'] . ' <label class="label label-primary pull-right"> ' . number_format($teMbledhurat/$loop, 2, '.', ',').'</label>'; 
					$shuma = $shuma + $teMbledhurat;
					$teMbledhurat = 0;
				}
			}else{
				echo 'Nuk eshte vlersuar ende nga asnje student';
			}


			
		?>
		</ul>
		<form method="POST" action=" <?php echo base_url('Admin'); ?>">
		<button class="btn btn-default">Admin Panel</button>
		</form>

		</div>
		<?php if($pergjigjet != 0): ?>
		<div class="col-md-4">
			<h3>Detajet per lenden</h3>
			<ul class="list-group">
				<li class="list-group-item">Komplet piket jan<label class="label label-primary pull-right"><?php echo $shuma; ?></label></li>
				<li class="list-group-item">Komplet pergjigjje jan<label class="label label-primary pull-right"><?php echo $mbledhes; ?></label></li>
				<li class="list-group-item">Komplet Student jan<label class="label label-primary pull-right"><?php echo $loop; ?></label></li>
				<li class="list-group-item">Mesatarja e komplet lendes eshte<label class="label label-primary pull-right"><?php  echo number_format($shuma/$mbledhes, 2, '.',','); ?></label></li>
				
			</ul>
		</div>
		<?php endif; ?>


		<script type="text/javascript">

		</script>
</div>