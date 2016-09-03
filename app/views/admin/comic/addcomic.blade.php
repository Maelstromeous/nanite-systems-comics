@extends('layouts.admin')

@section('title', 'NSC Admin')

@section('head')
<link href="<?= URL::to('assets/css/datepicker.css')?>" rel="stylesheet">

@stop

@section('content')
	<h1 style="text-align: center">Add Comic</h1>

	<?php if (count($errors->all()) > 0) : ?>
		<div class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<?php 
			foreach($errors->all() as $message)
			{
				echo "<li>".$message."</li>";
			}
			?>
		</div>
	<?php endif; ?>

	<?php if (!empty($input))
	{
		echo '<pre>';
			print_r($input);
		echo '</pre>';
	}

	?>

	<form enctype="multipart/form-data" role="form" method="POST" action="<?= URL::to('admin/comic/cropper')?>">
		<div class="form-group">
			<label for="title">Title</label>
			<input class="form-control" id="title" type="text"name="comicTitle" placeholder="Enter Comic Title" value="<?php Input::old('comicTitle')?>" />
		</div>
		<div class="form-group">
			<label for="datepicker">Date</label>
			<input class="form-control" id="datepicker" type="text" name="comicDate" placeholder="Enter Date" />
		</div>
		<div class="form-group">
			<label for="time">Time? (Leave blank for Midnight on date above)</label>
			<input class="form-control" id="time" type="text" name="comicTime" placeholder="HH:MM:SS" />
		</div>
		<div class="form-group">
			<label for="image">Image</label>
			<input class="form-control" id="image" type="file" name="image" placeholder="Enter Comic Title" />
		</div>
		<div class="form-group">
			<label for="title">Active?</label>
			<input id="active" name="active" type="checkbox" value="1">
		</div>

		<input name="submit" value="Submit" type="submit" />

	</form>

@stop

@section('jquery')
<script src="<?= URL::to('assets/js/bootstrap-datepicker.js')?>"></script>
<script>
	$('#datepicker').datepicker({
		format: 'yyyy/mm/dd'
	});
</script>

@stop