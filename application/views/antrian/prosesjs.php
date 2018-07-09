<script type="text/javascript">
  $(function (){
  	var interval = setInterval(function() {
        var momentNow = moment();
        $('#waktu').html(momentNow.format('dddd, DD MMMM YYYY') + ' Pukul '+ momentNow.format('HH:mm:ss'));
    }, 1000);
  	var call = <?= json_encode($antrian->suara)?>;
    $('#card-nextcall').click(function (){
      nextcall()
    })

    $('#card-recall').click(function (){
    	playAntrian()
    })

    function nextcall (){
    	$.ajax({
    		url: '<?=base_url('antrian/panggil/'.$poli->id)?>',
    		dataType: 'JSON',
    		method: 'GET',
    		success: function (response) {
    			$('#dilayani').html(response.urutan)
    			$('#sisa').html(response.sisa)
                $('#list-antrian').html(response.list_antrian)
                $('#tabel-antrian').html(response.daftar_antrian)
    			
    			call = response.suara
    			playAntrian()
    		}
    	})
    }

    function playAntrian(){
        var currentPlay = 0;
        var audioPlayer = document.getElementById('audioPlayer');
        audioPlayer.onended = function (){
            if (currentPlay < call.length){
                audioPlayer.src = '<?=base_url('audio/')?>'+call[currentPlay]+'.mp3?t='+moment().format('DDMMYYYHHmmss')
                audioPlayer.play()
            }else{
                currentPlay = 0;
                audioPlayer.src = '<?=base_url('audio/nomor-urut.mp3')?>'+'?t='+moment().format('DDMMYYYHHmmss')
            }
            currentPlay++;
        }
        audioPlayer.play()
    }
  })
</script>