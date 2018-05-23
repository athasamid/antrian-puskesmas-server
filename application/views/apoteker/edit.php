<div class="card">
	<div class="card-header">Edit Apoteker</div>
	<div class="card-body">
		<form action="<?= base_url('apoteker/do_edit/'.$apoteker->id) ?>" method="post" id="form-submit">
			<div class="form-group">
			    <label for="nama">Nama</label>
			    <input type="text" class="form-control" name="nama" id="nama" value="<?=$apoteker->nama?>" placeholder="Nama Lengkap">
			</div>
			<div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" name="username" id="username" value="<?=$apoteker->username?>" disabled="disabled" placeholder="Username">
			</div>
			<div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
			</div>
			<div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" value="<?=$apoteker->email?>" name="email" placeholder="Email">
			</div>
			<div class="form-group">
			    <label for="no_telp">No Handphone</label>
			    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?=$apoteker->no_hp?>" placeholder="No Handphone">
			</div>
			<div class="form-group">
			    <label for="alamat">Alamat</label>
			    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" rows="4"><?=$apoteker->alamat?></textarea>
			</div>
		</form>
		<button type="submit" class="btn btn-success btn-md" form="form-submit">Simpan</button>
		<a href="<?=base_url('apoteker')?>" class="btn btn-danger btn-md">Batal</a>
	</div>
</div>