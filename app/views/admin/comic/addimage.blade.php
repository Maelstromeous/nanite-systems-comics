@extends('layouts.admin')

@section('title', 'NSC Admin')

@section('head')
<link href="<?= URL::to('assets/css/cropper.css')?>" rel="stylesheet">

@stop

@section('content')

<h1 style="text-align: center">Add Image</h1>

{{ Form::open(array("url" => "admin/comic/commit")) }}

<div id="image1" style="position: relative;">

	<div id="crop_data_latest">
		<div class="input-group">
			<label class="input-group-addon" for="dataX">X</label>
			<input class="form-control" id="dataX" name="dataX" type="text" placeholder="x">
			<span class="input-group-addon">px</span>
		</div>
		<div class="input-group">
			<label class="input-group-addon" for="dataY">Y</label>
			<input class="form-control" id="dataY" name="dataY" type="text" placeholder="y">
			<span class="input-group-addon">px</span>
		</div>
		<div class="input-group">
			<label class="input-group-addon" for="dataWidth">Width</label>
			<input class="form-control" id="dataWidth" name="dataWidth" type="text" placeholder="width">
			<span class="input-group-addon">px</span>
		</div>
		<div class="input-group">
			<label class="input-group-addon" for="dataHeight">Height</label>
			<input class="form-control" id="dataHeight" name="dataHeight" type="text" placeholder="height">
			<span class="input-group-addon">px</span>
		</div>
	</div>

	<div id="crop_preview_latest">
		<div id="crop_preview_latest_image"></div>
		<div id="crop_preview_latest_ui">
			<img src="<?= URL::to('assets/img/latest.png')?>">
		</div>
	</div>

	<h4 style="text-align: center;">Homepage Image</h4>
	<div id="latest">
		<div id="crop_container_latest">
			<img src="<?= $comic["webPath"] ?>" />
		</div>	
	</div>

</div>
<hr>

<div class="spacer"></div>

<div id="archive" style="position: relative;">
	<h4 style="text-align: center;">Archive Image</h4>

	<div id="crop_container_archive">
		<img src="<?= $comic["webPath"] ?>" />
	</div>

	<div id="crop_preview_archive">
		<div id="crop_preview_archive_image"></div>
		<div id="crop_preview_archive_ui"></div>
	</div>

	<div id="crop_data_latest">
		<div class="input-group">
			<label class="input-group-addon" for="dataXArchive">X</label>
			<input class="form-control" id="dataXArchive" name="dataXArchive" type="text" placeholder="x">
			<span class="input-group-addon">px</span>
		</div>
		<div class="input-group">
			<label class="input-group-addon" for="dataYArchive">Y</label>
			<input class="form-control" id="dataYArchive" name="dataYArchive" type="text" placeholder="y">
			<span class="input-group-addon">px</span>
		</div>
		<div class="input-group">
			<label class="input-group-addon" for="dataWidthArchive">Width</label>
			<input class="form-control" id="dataWidthArchive" name="dataWidthArchive" type="text" placeholder="width">
			<span class="input-group-addon">px</span>
		</div>
		<div class="input-group">
			<label class="input-group-addon" for="dataHeightArchive">Height</label>
			<input class="form-control" id="dataHeightArchive" name="dataHeightArchive" type="text" placeholder="height">
			<span class="input-group-addon">px</span>
		</div>
	</div>
</div>

<hr>
<div class="automargin" style="text-align: center;">
	<input type="submit" value="Submit!">
</div>

{{ Form::close() }}

@stop

@section('jquery')
<script src="<?= URL::to('assets/js/cropper.js')?>"></script>
<script>
$("#crop_container_latest > img").cropper({
	data: {
		x: 0,
		y: 0,
		width: 698,
		height: 222
	},
	multiple: true,
	zoomable: false,
	dragCrop: false,
	aspectRatio: 3.144144144144144,
	preview: "#crop_preview_latest_image",
	done: function(data) {
		$("#dataX").val(data.x);
		$("#dataY").val(data.y);
		$("#dataWidth").val(data.width);
		$("#dataHeight").val(data.height);
	}
});

$("#crop_container_archive > img").cropper({
	data: {
		x: 0,
		y: 0,
		width: 175,
		height: 126
	},
	multiple: true,
	zoomable: false,
	dragCrop: false,
	aspectRatio: 1.388888888888889,
	preview: "#crop_preview_archive_image",
	done: function(data) {
		$("#dataXArchive").val(data.x);
		$("#dataYArchive").val(data.y);
		$("#dataWidthArchive").val(data.width);
		$("#dataHeightArchive").val(data.height);
	}
});
</script>

@stop