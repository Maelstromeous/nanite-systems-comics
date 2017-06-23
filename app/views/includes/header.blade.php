<div id="header" class="automargin">
	<span class="navbuttons" style="bottom: 127px; left: 310px; font-size: 14px; color: rgb(75, 75, 75); font-weight: bold; width: 200px; padding: 0; cursor: default;">Nanite Systems Comics</span>
	<a class="navbuttons" href="<?= URL::to('contact') ?>" style="bottom: 123px; left: 44px;">Contact &amp; Ideas</a>
	<a class="navbuttons" href="http://www.patreon.com/kogoros" style="bottom: 112px; right: 23px; font-size: 17px;">Support the Comic (via Patreon)</a>
	<a class="navbuttons" href="<?= URL::to('extras') ?>" style="bottom: 44px; left: 40px;">Extras</a>
	<a class="navbuttons" style="bottom: 44px; right: 21px; font-size: 16px">Store (Coming Soon)</a>
<?php if(Request::path() != "/") : ?>
	<a class="navbuttons" href="<?= URL::to('') ?>" style="bottom: 15px; left: 275px; font-size: 40px; width: 270px;">Home</a>
<?php else : ?>
	<a class="navbuttons" href="<?= URL::to('archive') ?>" style="bottom: 15px; left: 275px; font-size: 40px; width: 270px">Archive</a>
<?php endif; ?>
</div>
