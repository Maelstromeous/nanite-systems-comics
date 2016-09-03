@extends('layouts.master')

@section('title', 'Nanite Systems Comics - Extras')
@section('content')

<div class="rounded_container">
	<p class="section_header">Extras</p>

	<p class="section_subheader">Wallpapers</p>
	<div class="automargin" style="width: 670px; overflow: hidden;">
		<div class="padder" style="float: left;">
			<a href="http://alpha.wallhaven.cc/wallpaper/107841"><img src="<?= URL::to('assets/img/extras/wallpaper1.jpg')?>" /></a>
		</div>
		<div class="padder" style="float: left; margin-left: 10px;">
			<a href="http://alpha.wallhaven.cc/wallpaper/107842"><img src="<?= URL::to('assets/img/extras/wallpaper2.jpg')?>" /></a>
		</div>
	</div>

	<p class="section_subheader">Videos</p>
	<div class="automargin padder" style="width: 660px;">
		<iframe width="630" height="385" src="//www.youtube.com/embed/Hj2-q_RBzxY" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="automargin padder" style="width: 660px;">
		<iframe width="630" height="385" src="//www.youtube.com/embed/kBYlJ7MIHuQ" frameborder="0" allowfullscreen></iframe>
	</div>
	<div class="automargin padder" style="width: 660px;">
		<iframe width="630" height="385" src="//www.youtube.com/embed/jS3RtLKtqQM" frameborder="0" allowfullscreen></iframe>
	</div>
</div>

@stop