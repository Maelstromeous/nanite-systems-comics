@extends('layouts.master')

@section('title', 'Nanite Systems Comics - Contact')

@section('head') 
	
@stop

@section('content')

<div class="rounded_container">
	<p class="section_header">Contact &amp; Ideas</p>

	<?php $error = Session::get('error'); ?>
	<?php $message = Session::get('message'); ?>
	<?php if (!empty($error)): ?>

		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<?=$error ?>
		</div>

	<?php endif; ?>

	<?php if (!empty($message)): ?>

		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<?=$message ?>
		</div>

	<?php endif; ?>

	<div id="contact_form" class="automargin">
		<div role="tabpanel">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">Contact</a></li>
				<li role="presentation"><a href="#ideas" aria-controls="ideas" role="tab" data-toggle="tab">Ideas</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="contact">
					<form class="form-horizontal" role="form" action="<?= URL::to('submit/contact')?>" method="POST">
						<div class="form-group"> 
							<label for="email" class="col-sm-3 control-label">Your Email</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" name="email" id="email" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-3 control-label">Ingame Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="name" id="name" placeholder="Name">
							</div>
						</div>

						<div class="form-group">
							<label for="contactMessage" class="col-sm-3 control-label">Your Message</label>
							<div class="col-sm-9">
								<textarea class="form-control" id="contactMessage" name="conMessage" placeholder="Your Message" rows="10"></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="automargin" style="width: 380px;">
								<p style="text-align: center;">What is the full name of the Red faction within the game?</p>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="check" id="check" placeholder="Answer to verifiy your humanity">
								</div>
							</div>
						</div>

						<div class="automargin" style="width: 105px">
							<button type="submit" class="btn btn-default">Contact me!</button>
						</div>

					</form>	
				</div>
				<div role="tabpanel" class="tab-pane" id="ideas">
					<form class="form-horizontal" role="form" action="<?= URL::to('submit/idea')?>" method="POST">
						<div class="form-group"> 
							<label for="email" class="col-sm-3 control-label">Your Email</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" name="email" id="email" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="name" class="col-sm-3 control-label">Ingame Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="name" id="name" placeholder="Name">
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="col-sm-3 control-label">Idea Title</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="title" id="title" placeholder="Idea Title">
							</div>
						</div>

						<div class="form-group">
							<label for="ideaMessage" class="col-sm-3 control-label">Idea Brief</label>
							<div class="col-sm-9">
								<textarea class="form-control" id="ideaMessage" name="ideaBrief" placeholder="Idea Brief - Please try to be as concise as possible." rows="10"></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="automargin" style="width: 380px;">
								<p style="text-align: center;">What is the full name of the Red faction within the game?</p>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="check" id="check" placeholder="Answer to verifiy your humanity">
								</div>
							</div>
						</div>

						<div class="automargin" style="width: 105px">
							<button type="submit" class="btn btn-default">Submit Idea</button>
						</div>

					</form>	
				</div>
			</div>
		</div>
	</div>
</div>

@stop

@section('jquery')
	<script src="<?= URL::to('assets/js/bootstrap.min.js') ?>"></script>
	<script>

	</script>
@stop