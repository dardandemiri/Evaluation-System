<div class="container">
	<div class="col-md-12">
		<?php $total_mesatarja = 0; $count = 0; ?>
		<form method="post" action="">

			<h4>Profesori: </h4><h3 style="display:inline-block; color:#0048e5;" >Diar selimi</h3> 
			
			<h4>Lëndët që ligjëron: </h4>

			<ul class="list-group">
				<?php for($i = 0; $i < count($lendet); $i++): ?>
				<li class="list-group-item">

					<a href="<?php echo base_url('Admin/statistika/'.$lendet[$i]['ID']); ?>"><?php echo $lendet[$i]['Emri']; ?></a>

					<div class="pull-right">
						<label> <?php $total_mesatarja += $lendet[$i]['mesatarja'];  echo ($lendet[$i]['mesatarja'] == 0 ? 'E pa vlersuar' : 'Mesatarja: '.$lendet[$i]['mesatarja']); ?></label>
					</div>
					<?php 
						if($lendet[$i]['mesatarja'] != 0){
							$count ++;
						}
					?>
				</li>
			<?php endfor; ?>
			</ul>

			<h4>Gjithsej mesatarja: <?php echo substr($total_mesatarja / $count, 0, 4); ?></h4>
			
			<a href="<?php echo base_url('Admin/profesoret'); ?>" class="btn btn-primary pull-right">Kthehu mbrapa</a>
		</form>
	</div>
</div>