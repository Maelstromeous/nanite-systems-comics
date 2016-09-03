@extends('layouts.admin')

@section('title', 'NSC Admin')

@section('content')
	<h1 style="text-align: center">Edit Comic</h1>

	<?php

		echo "<pre>";
			print_r($comic);
		echo "</pre>";
	?>
@stop