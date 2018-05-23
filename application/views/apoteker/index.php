<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-table"></i> Data Apoteker <a href="<?= base_url('apoteker/buat')?>" class="btn pull-right btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="text-center">
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Username</th>
            <th width="17%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i= 1; foreach ($apoteker as $row) { ?>
              <tr>
                <td class="text-center"><?=$i?></td>
                <td><?= $row->nama?></td>
                <td><?= $row->email?></td>
                <td><?= $row->alamat?></td>
                <td><?= $row->no_hp?></td>
                <td><?= $row->username?></td>
                <td><a href="<?=base_url('apoteker/edit/'.$row->id)?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Ubah</a> <button class="btn btn-danger btn-delete btn-sm"><i class="fa fa-trash"></i> Hapus</button>  <form action="<?=base_url('apoteker/do_delete/'.$row->id)?>" id="form-delete"></form> </td>
              </tr>
          <?php $i++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>