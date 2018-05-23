<script type="text/javascript">
	$(function (){
		$('#form-submit').ajaxForm({
			dataType : 'JSON',
			success : function (response){
				if ('error' in response) {
					alertify.error(response.error)
				} else if ('success' in response) {} {
					alertify.success('Data Berhasil di Simpan')
					// Redirect
					setTimeout(function (){
						window.location.replace(response.redirect)
					}, 2000)
				}
			},
		})
	})
</script>