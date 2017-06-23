@extends('layouts.master')

@section('title', $data["current"][0]->comicTitle.' - Nanite Systems Comics')
@section('content')

@include('includes/subnav', array('data' => $data))

<div id="comicContainer" class="automargin" style="margin-top: 5px;">
	<img class="comic" src="<?= URL::to('assets/comics/'.$data["current"][0]->comicURL) ?>" alt="Comic <?=$data["current"][0]->dataID?>" />

	<div class="permalink">
		<span>Permanent link to this comic: <a href="<?= URL::to('comic/'.$data["current"][0]->dataID) ?>">https://nanitesystemscomic.com/comic/<?= $data["current"][0]->dataID?></a></span>
	</div>
</div>

<div class="subnavButtons automargin" id="toTop" style="">
	<img src="<?= URL::to('assets/img/top.png') ?>" alt="toTop" />
</div>

@include('includes/subnav', array('data' => $data))

@include('disqus')

@stop

@section('jquery')

<script>

$("#toTop").click(function(event) {
	var body = $("html, body");
	body.animate({scrollTop:0}, '1000', 'swing', function() {
	});
});
</script>

@stop
