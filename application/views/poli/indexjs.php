<script type="text/javascript">
	$(function(){
		$('.btn-delete').click(function (){
			var $this = $(this);
			alertify.confirm("Peringatan!!!","Apakah anda yakin akan menghapus data?\nData yang telah dihapus tidak dapat dikembalikan!!!",
			  function(){
			    $this.closest('td').find('form').submit();
			  },
			  function(){
			    
			  });
		})

		$('form').ajaxForm({
			dataType: 'JSON',
			success: function (response) {
				if ('error' in response) {
					alertify.error(response.error);
				}else if ('success' in response){
					alertify.success('Data berhasil di hapus')
					window.location.replace(response.redirect)
				}
			}
		})

		$('#dataTable').DataTable({
            language: {
                processing:     "Mendapatkan data...",
                search:         "Cari&nbsp;:",
                lengthMenu:     "Tampilkan _MENU_ data",
                info:           "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                infoFiltered:   "( Tersaring dari total _MAX_ )",
                infoPostFix:    "",
                loadingRecords: "Mengambil data...",
                zeroRecords:    "Tidak ada data yang dapat di tampilkan",
                emptyTable:     "Belum ada data",
                paginate: {
                    first:      "Awal",
                    previous:   "Sebelumnya",
                    next:       "Selanjutnya",
                    last:       "Terakhir"
                },
            }
        })
	})
</script>