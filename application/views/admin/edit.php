<div class="card">
	<div class="card-header">Edit Admin</div>
	<div class="card-body">
		<form action="<?= base_url('admin/do_edit/'.$admin->id) ?>" method="post" id="form-submit">
			<div class="form-group">
			    <label for="nama">Nama</label>
			    <input type="text" class="form-control" name="nama" id="nama" value="<?=$admin->nama?>" placeholder="Nama Lengkap">
			</div>
			<div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" name="username" id="username" value="<?=$admin->username?>" disabled="disabled" placeholder="Username">
			</div>
			<div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
			</div>
			<div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" value="<?=$admin->email?>" name="email" placeholder="Email">
			</div>
			<div class="form-group">
			    <label for="no_telp">No Handphone</label>
			    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?=$admin->no_hp?>" placeholder="No Handphone">
			</div>
			<div class="form-group">
			    <label for="alamat">Alamat</label>
			    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat" rows="4"><?=$admin->alamat?></textarea>
			</div>
		</form>
		<button type="submit" class="btn btn-success btn-md" form="form-submit">Simpan</button>
		<a href="<?=base_url('admin')?>" class="btn btn-danger btn-md">Batal</a>
	</div>
</div>