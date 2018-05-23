<div class="card">
	<div class="card-body">
		<h5 class="card-title"><?=$poli->nama?></h5>
		<h6 class="card-subtitle mb-2 text-muted" id="waktu">Sabtu, 19 Mei 2018 Pukul 20:00:00</h6>
		
	</div>
</div>
<div class="row mt-4">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Antrian</h5>
				<ul id="list-antrian" class="list-group list-group-flush">
					<?= $antrian->list_antrian?>
				</ul>
			</div>
		</div>
		<div class="mt-4">
			<div class="mr-1 card pull-left" style="width: 49%">
				<div class="card-body">
					<h5 class="card-title">Dilayani</h5>
					<ul class="list-group list-group-flush">
						<li id="dilayani" class="text-center list-group-item"><?=$antrian->urutan?></li>
					</ul>
				</div>
			</div>
			<div class="ml-1 card pull-right" style="width: 49%">
				<div class="card-body">
					<h5 class="card-title">Sisa</h5>
					<ul class="list-group list-group-flush">
						<li id="sisa" class="text-center list-group-item"><?=$antrian->sisa?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body text-white bg-success text-center" style="cursor: pointer;" id="card-nextcall">
				<i class="fa fa-5x fa-step-forward"></i>
				<h6 class="card-subtitle mt-1">Panggil Selanjutnya</h6>
			</div>
		</div>
		<div class="card text-white bg-danger mt-3">
			<div class="card-body text-center" style="cursor: pointer;" id="card-recall">
				<i class="fa fa-5x fa-repeat"></i>
				<h6 class="card-subtitle mt-1">Panggil Ulang</h6>
			</div>
		</div>
	</div>
</div>

<audio id="audioPlayer" src="<?= base_url('audio/nomor-urut.mp3')?>"></audio>