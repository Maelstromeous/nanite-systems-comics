@extends('layouts.admin')

@section('title', 'NSC Admin')

@section('content')
	<h1 style="text-align: center">List Comics</h1>

	<table class="table table-striped">
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Date</th>
			<th>Active</th>
			<th>Actions</th>
		</tr>
	<?php foreach ($comics as $comic) : ?>
		<tr>
			<td><?= $comic->dataID ?></td>
			<td><a href="<?= URL::to('comic/'.$comic->dataID)?>"><?= $comic->comicTitle ?></a></td>
			<td><?= $comic->comicDate ?></td>
			<td>
			<?php if ($comic->active == 1) : ?>
				<span class="label label-success">Active</span>
			<?php else : ?>
				<span class="label label-danger">Not Active</span>
			<?php endif; ?>
			</td>
			<td>
				<a class="btn btn-primary btn-xs" href="<?= URL::to('admin/comic/edit/'.$comic->dataID)?>">Edit</a>
				<a class="btn btn-danger btn-xs" href="<?= URL::to('admin/comic/delete/'.$comic->dataID)?>">Delete</a>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
@stop