<div id="subnav" class="automargin">
	<div class="subnavButtons" id="first">
		<a href="<?= URL::to('comic/'.$data["first"][0]->dataID)?>">
			<img src="<?= URL::to('assets/img/first.png') ?>" alt="first" />
		</a>
	</div>
	<div class="subnavButtons bigbuttons" id="prev">

	<?php if (!empty($data["prev"])) : ?>
		<a href="<?= URL::to('comic/'.$data["prev"][0]->dataID)?>">
			<span class="subnavButtonsText">Prev</span>
			<img src="<?= URL::to('assets/img/prev.png') ?>" alt="previous" />
		</a>
	<?php else : ?>
		<span class="subnavButtonsText">Prev</span>
		<img src="<?= URL::to('assets/img/prev_dis.png') ?>" alt="previous" />
	<?php endif; ?>
	</div>
	<div class="subnavButtons bigbuttons" id="archive">
		<a href="<?= URL::to('archive')?>">
			<span class="subnavButtonsText" style="left: 30px;">Archive</span>
			<img src="<?= URL::to('assets/img/archive.png') ?>" alt="archive" />
		</a>
	</div>
	<div class="subnavButtons bigbuttons" id="next">
		
	<?php if (!empty($data["next"])) : ?>
		<a href="<?= URL::to('comic/'.$data["next"][0]->dataID)?>">
			<span class="subnavButtonsText">Next</span>
			<img src="<?= URL::to('assets/img/next.png') ?>" alt="next" />
		</a>
	<?php else : ?>
		<span class="subnavButtonsText">Next</span>
		<img src="<?= URL::to('assets/img/next_dis.png') ?>" alt="previous" />
	<?php endif; ?>
	</div>
	<div class="subnavButtons" id="last">
	<?php if (!empty($data["last"])) : ?>
		<a href="<?= URL::to('comic/'.$data["last"][0]->dataID)?>">
			<img src="<?= URL::to('assets/img/last.png') ?>" alt="last" />
		</a>
	<?php endif; ?>
	</div>
</div>

<?php

	/*echo '<pre>';
		print_r($data);
	echo '</pre>';**/

?>