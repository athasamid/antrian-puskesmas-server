<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Antrian Puskesmas - Login</title>
	<!-- Bootstrap core CSS-->
	<link href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet">
	<!-- Custom fonts for this template-->
	<link href="<?= base_url('css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css">

	<link href="<?= base_url('css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css">
	  
	<!-- Custom styles for this template-->
	<link href="<?= base_url('css/sb-admin.min.css')?>" rel="stylesheet">
	<link href="<?= base_url('css/alertify.min.css')?>" rel="stylesheet">
</head>
<body class="bg-dark">
	<div class="container">
		<div class="card card-login mx-auto mt-5">
			<div class="card-header">Login</div>
			<div class="card-body">
				<form action="<?= base_url('auth/do_login')?>" method="POST">
					<div class="form-group">
						<label for="inputEmail">Username</label>
						<input type="text" class="form-control" id="inputEmail" name="username" placeholder="Username">
					</div>
					<div class="form-group">
						<label for="inputPassword">Password</label>
						<input type="password" class="form-control" id="inputPassword" name="password" placeholder="password">
					</div>
					<div class="form-group">
			            <div class="form-check">
			              <label class="form-check-label">
			                <input class="form-check-input" type="checkbox"> Remember Password</label>
			            </div>
			        </div>
					<button type="submit" class="btn btn-primary btn-block">Login</button>
				</form>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('js/popper.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('js/jquery.form.min.js') ?>"></script>
    <script src="<?= base_url('js/sb-admin.min.js') ?>"></script>
    <script src="<?= base_url('js/dataTables.bootstrap4.min.js') ?>"></script>
    <script src="<?= base_url('js/moment.js') ?>"></script>
    <script src="<?= base_url('js/id.js') ?>"></script>
    <script src="<?= base_url('js/alertify.min.js') ?>"></script>
    <script type="text/javascript">
    	$(function(){
    		$('form').ajaxForm({
    			dataType: 'JSON',
    			success: function (data){
    				if ('error' in data) {
    					alertify.error(data.error.join('<br>'));
    				}else if('success' in data){
    					window.location.href = data.redirect
    				}
    			}
    		})
    	})
    </script>
</body>
</html>