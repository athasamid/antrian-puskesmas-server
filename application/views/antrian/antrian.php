<?php foreach ($poli as $row): ?>
	<div class="row mt-2">
	<?php foreach ($row as $value): ?>
		<div class="col-sm-4">
			<div class="card text-center">
				<div class="card-body">
					<img src="<?=base_url($value->icon)?>" class="img-circle img-responsive">
					<h5 class="card-title"><?=$value->nama?></h5>
					<a href="<?=base_url('antrian/proses/'.$value->id)?>" class="btn btn-primary">Panggil</a>
				</div>
			</div>
		</div>
	<?php endforeach ?>
	</div>
<?php endforeach ?>