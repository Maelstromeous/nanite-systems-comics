<!doctype html>
<html lang="en">
	<head>
		<link href='https://fonts.googleapis.com/css?family=Noto+Sans|Orbitron:400,700' rel='stylesheet' type='text/css'>
		@yield('head')
		<link rel="stylesheet" href="<?= URL::to('assets/css/bootstrap.min.css')?>">
		<link rel="stylesheet" href="<?= URL::to('assets/css/stylesheet.css')?>">

		<title>@yield('title')</title>
		<meta name="description" content="Nanite Systems Comics is a comic series based on the game Planetside 2.">
		<meta name="keywords" content="nanite, systems, comics, planetside, planetside2, planetside 2, nanite systems comics, nanite system comics, korogos, maelstrome26">
		<meta name="author" content="Korogos">
		<meta property="og:title" content="@yield('title')" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?= Request::url(); ?>" />		<meta property="og:image" content="<?= URL::to('assets/img/logo.png') ?>" />
		<meta property="og:description" content="Nanite Systems Comics is a comic series based on the game Planetside 2.">
		<link rel="shortcut icon" href="<?= URL::to('favicon.ico?v=2')?>" />
	</head>
	<body>
		<div id="wrapper" class="automargin">
				@include('includes/header')
			<div id="content" class="automargin">
				@yield('content')
			</div>

			@include('ads/ad_left')
		</div>

		<div id="footer" class="automargin contentBack">
			 Kogoros &copy; <?= date("Y") ?> - Website proudly hosted and developed by <a href="http://twitter.com/Maelstromeous">@Maelstromeous</a>
		</div>

		<script src="<?= URL::to('assets/js/jquery-2.1.1.min.js')?>"></script>
		@yield('jquery')

		@include('includes/analyitics')

	</body>
</html>
