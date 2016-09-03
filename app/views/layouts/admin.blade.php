<!doctype html>
<html lang="en">
	<head>
		<link href='http://fonts.googleapis.com/css?family=Noto+Sans|Orbitron:400,700' rel='stylesheet' type='text/css'>
		@yield('head')
		<link rel="stylesheet" href="<?= URL::to('assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" href="<?= URL::to('assets/css/admin.css')?>">

		<title>NSC Admin</title>
		<link rel="shortcut icon" href="<?= URL::to('favicon.ico?v=2')?>" />
	</head>
	<body>
		<div id="wrapper" class="automargin">
				@include('admin/adminheader')
			<div id="content" class="automargin">
				@yield('content')
			</div>
		</div>

		<script src="<?= URL::to('assets/js/jquery-2.1.1.min.js')?>"></script>
		<script src="<?= URL::to('assets/js/bootstrap.min.js') ?>"></script>
		@yield('jquery')

	</body>
</html>