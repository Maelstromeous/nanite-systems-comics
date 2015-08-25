@extends('layouts.admin')

@section('title', 'NSC Admin')

@section('content')
	<h1 style="text-align: center">Welcome <?= Auth::user()->name ?>!</h1>
@stop