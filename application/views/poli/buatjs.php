<script type="text/javascript">
	$(function(){
		$('form').ajaxForm({
			dataType: 'JSON',
			success: function (data){
				if ('error' in data) {
					alertify.error(data.error);
				} else if('success' in data){
					alertify.success('Data berhasil disimpan');
					setTimeout(function() { window.location.replace(data.redirect) }, 1000);
				}
			}
		})
		$('input[type=file]').change(function(){
            //$(this).append('<input type="file" name="file[]" value="'+$this.file+'"/>');
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                    $('#previe').show();
                }

                reader.readAsDataURL(input.files[0]);
            }
        });
	})
</script>