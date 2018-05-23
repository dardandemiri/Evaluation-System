<div class="container">
	<div class="col-md-12">
		<br />
		<form action="<?php echo base_url('Lendet/save_formular'); ?>" method="post" id="forma_pyetjeve">
			<?php  $count = 0; ?>
			<div class="pytjetKrejt">
			<ul class="list-group">
			<?php foreach($pyetjet as $pyetja):?>
				<li class="list-group-item" >
					<?php echo '<h3>' . $pyetja->pytja .'</h3>'; ?> 
					<input type="hidden" name="pytja<?php echo $count; ?>" value="<?php echo $pyetja->ID; ?>">
					<label for=""> 
						<input type="radio" name="vlersimi<?php echo $count; ?>" value="0"> 0 |
						<input type="radio" name="vlersimi<?php echo $count; ?>" value="1"> 1 |
						<input type="radio" name="vlersimi<?php echo $count; ?>" value="2"> 2 |
						<input type="radio" name="vlersimi<?php echo $count; ?>" value="3"> 3 |
						<input type="radio" name="vlersimi<?php echo $count; ?>" value="4"> 4 |
						<input type="radio" name="vlersimi<?php echo $count; ?>" value="5"> 5 |
						<input type="radio" name="vlersimi<?php echo $count; ?>" value="6"> 6 |
						<input type="radio" name="vlersimi<?php echo $count; ?>" value="7"> 7 |
						<input type="radio" name="vlersimi<?php echo $count; ?>" value="8"> 8 |
						<input type="radio" name="vlersimi<?php echo $count; ?>" value="9"> 9 |
						<input type="radio" name="vlersimi<?php echo $count; ?>" value="10"> 10 |
 					</label> 
	
					</li>
				<?php $count++; ?>
			<?php endforeach; ?>
			</ul>
			</div>
			<input type="hidden" value="<?php echo $count-1; ?>" name="total_answers" id="total_answers">
			<input type="hidden" value="<?php echo $lenda_id; ?>" name="landa_id">
			
			<p><strong>Vërejtje!</strong> Sistemi i vlerësimit ju garanton 100% që anonimiteti juaj do të jetë i sigurtë. Nëse vendosni të zgjidhni publik apo anonim është zgjidhje e juaja, mirëpo ju lutemi të jeni shumë të sinëqertë në përgjigjjet tuaja sepse vlerësimi yt vlen shumë.</p>
			<div class="col-md-12">
				<div class="anonimiteti">
					<label for="anonim">Anonim </label>
					<input type="radio" id="anonim" name="anonim" value="0" >
					<label for="publike">Publike </label>
					<input type="radio" id="publike" name="anonim" value="1" checked>
					<div class="alert alert-danger" style="display: none;">
						Nuk mund ta ruani pa i plotsuar te gjitha pyetjet !
					</div>
					<button type="submit" class="btn btn-success">Dergo</button>
				</div>
			</div>
		</form>

		<br /><br /><br /><br />
	</div>
</div>

