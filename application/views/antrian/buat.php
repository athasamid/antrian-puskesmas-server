<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Antrian Puskesmas</title>
	<link href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?= base_url('css/pace-theme-center-simple.css')?>" rel="stylesheet">
	<link href="<?= base_url('css/sb-admin.min.css')?>" rel="stylesheet">
	<style type="text/css">
		@media screen {
			.print-area {
				display: none;
			}
		}

		@media print {
		    .print-area {
		       display: block;
		    }
		}
	</style>
</head>
<body class="bg-info">
	<div class="container">
		<h1 class="text-center mt-5 text-white">ANTRIAN PUSKESMAS </h1>
		<?php foreach ($poli as $row): ?>
			<div class="row mt-4">
			<?php foreach ($row as $value): ?>
				<div class="col-sm-3">
					<div class="card bg-warning text-center" style="cursor: pointer;" data-id="<?=$value->id?>">
						<div class="card-body">
							<img src="<?=base_url($value->icon)?>" >
							<h5 class="card-title"><?=$value->nama?></h5>
						</div>
					</div>
				</div>
			<?php endforeach ?>
			</div>
		<?php endforeach ?>
	</div>

	<div id="print-area" class="print-area">
		<h1 class="text-center" style="margin: 0">PUSKESMAS KOTA BATU</h1>
		<p class="text-center" style="margin: 0">JL Sesama No 20 Kota Batu Malang</p>
		<h5 class="text-center" style="margin: 0" id="poli">Nama poli</h5>
		<p class="text-center text-muted" style="margin: 0" id="waktu">Tanggal: 20/05/2018   Jam: 20:00:00</p>
		<div class="border border-dark p-2 m-2">
			<h6>Nomor Antrian Anda</h6>
			<p class="text-center" style="font-size: 3em; font-weight: bold;" id="nomor">001</p>
		</div>
	</div>

	<script src="<?= base_url('js/jquery.min.js') ?>"></script>

    <script src="<?= base_url('js/popper.min.js') ?>"></script>

    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('js/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('js/pace.min.js') ?>"></script>

    <script type="text/javascript">
    	$(function (){
    		paceOptions = {
			  // Disable the 'elements' source
			  elements: false,

			  // Only show the progress on regular and ajax-y page navigation,
			  // not every request
			  restartOnRequestAfter: false
			}
    		$('.card').click(function (){
    			var id = $(this).data('id');
    			$.ajax({
    				url: '<?=base_url('antrian/do_buat')?>/'+id,
    				dataType: 'JSON',
    				method: 'GET',
    				success: function (result){
    					console.log(result)
    					$('#poli').html(result.poli.nama)
    					$('#waktu').html(result.waktu)
    					$('#nomor').html(result.antrian)

    					printDiv('print-area');
    				}
    			})
    		})

    		function printDiv(divid) {
			    var contents = document.getElementById(divid).innerHTML;
			    var frame1 = document.createElement('iframe');
			    frame1.name = "frame1";
			    frame1.style.position = "absolute";
			    frame1.style.top = "-1000000px";
			    document.body.appendChild(frame1);
			    var frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;
			    frameDoc.document.open();
			    frameDoc.document.write('<html><head><title>Print</title><style>@media print {@page { margin: 0; }body { margin: 1.6cm; }}</style><link href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet">');
			    frameDoc.document.write('</head><body>');
			    frameDoc.document.write(contents);
			    frameDoc.document.write('</body></html>');
			    frameDoc.document.close();
			    setTimeout(function () {
			        window.frames["frame1"].focus();
			        window.frames["frame1"].print();
			        document.body.removeChild(frame1);
			    }, 500);
			    return false;
			}
    	})
    </script>
</body>
</html>