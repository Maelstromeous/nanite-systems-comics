<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?= URL::to('')?>">NSC Homepage</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php if (Auth::check()) : ?>
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Comic Admin <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?= URL::to('admin/comic/list')?>">Comic List</a></li>
						<li class="divider"></li>
						<li><a href="<?= URL::to('admin/comic/add')?>">Add a Comic</a></li>
						<li class="divider"></li>
						<li><a href="https://www.google.com/analytics/web/?#report/visitors-overview/a15631800w90599509p94216627/%3F_u.dateOption%3Dlast30days%26overview-graphOptions.selected%3Danalytics.nthDay%26overview-graphOptions.primaryConcept%3Danalytics.totalVisitors/">Google Analytics</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Annonucements <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?= URL::to('admin/extras/add')?>">Add Announcement (Not done!)</a></li>
						<li><a href="<?= URL::to('admin/extras/delete')?>">Delete Announcement (Not done!)</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Extras Admin <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="<?= URL::to('admin/extras/add')?>">Add Extra (Not done!)</a></li>
						<li><a href="<?= URL::to('admin/extras/delete')?>">Delete Extra (Not done!)</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?= URL::to('admin/flush')?>"><span style="color: red;"?>Delete Cache</span></a></li>
				<li><a href="<?= URL::to('admin/logout')?>">Logout</a></li>
			</ul>
			<?php endif; ?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>