@extends('layouts.admin')
@section('content')

<?php $message = Session::get('message'); ?>

<?php if (!empty($message)) : ?>
	<div class="alert alert-danger" role="alert"><?= $message ?></div>
<?php endif; ?>

<div class="automargin" style="width: 400px;">
<!-- if there are login errors, show them here -->
<p>
	{{ $errors->first('username') }}
	{{ $errors->first('password') }}
</p>
{{ Form::open(array('url'=>'admin/login', 'class'=>'form-signin')) }}
    <h2 class="form-signin-heading">Please Login</h2>
 
    {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username')) }}
    <div style="margin-top: 5px;"></div>
    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
    <br>
 
    {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}
</div>

@stop