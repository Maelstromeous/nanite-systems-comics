@extends('layouts.master')

@section('title', 'Nanite Systems Comics')

@section('content')

<div class="rounded_container" style="overflow: hidden;">
	<p class="section_header">Comic Archive</p>
	<?php $count = 0 ?>
	<div id="archiveContainer">
		<div class="comicRow">
		<?php foreach($data["comics"] as $comic) : ?>
		
		<?php if ($count / 4 == 1) : ?>
			<?php $count = 0 ?>
			</div>
			<div class="comicRow">
		<?php endif; ?>
				<div class="comicCard">
					<div class="comicImage">
						<a href="<?= URL::to('comic/'.$comic->dataID)?>"><img src="<?= URL::to('assets/comics/thumbs/'.$comic->comicURL) ?>" /></a>
					</div>
					<a class="comicTitle" href="<?= URL::to('comic/'.$comic->dataID)?>">
						<b><?= $comic->comicTitle ?></b>
						<br><span style="font-size: 14px;"><?= date("d/m/Y", strtotime($comic->comicDate))?></span>
					</a>
					<div class="comicNumber"><?= $comic->dataID ?></div>
				</div>
			<?php $count++; ?>
		<?php endforeach; ?>
		</div>
	</div>
</div>

@stop

