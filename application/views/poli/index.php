<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-table"></i> Data Poli <a href="<?= base_url('poli/buat')?>" class="btn pull-right btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a></div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="text-center">
            <th width="5%">No</th>
            <th width="20%">Icon</th>
            <th>Nama</th>
            <th width="17%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $i= 1; foreach ($poli as $row) { ?>
              <tr>
                <td class="text-center"><?=$i?></td>
                <td><img src="<?=base_url($row->icon)?>" class="img-circle img-responsive" width="100%"></td>
                <td><?= $row->nama?></td>
                <td><a href="<?=base_url('poli/edit/'.$row->id)?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Ubah</a> <button class="btn btn-danger btn-delete btn-sm"><i class="fa fa-trash"></i> Hapus</button>  <form action="<?=base_url('poli/do_delete/'.$row->id)?>" id="form-delete"></form> </td>
              </tr>
          <?php $i++; } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>