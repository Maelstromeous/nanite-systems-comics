@extends('layouts.master')

@section('title', 'Nanite Systems Comics')
@section('content')

<div class="rounded_container">

	<div id="latest" class="automargin">
		<a href="<?= URL::to('comic/'.$data["current"][0]->dataID)?>">
			<img id="latest_border" src="<?= URL::to('assets/img/latest.png') ?>">
			<div id="latest_text">
				<span>Latest Comic</span>
			</div>
			<div id="latest_strip">
				<img id="latest_strip_image" src="<?= URL::to('assets/comics/thumbs/latest/'.$data["current"][0]->dataID.'_latest.jpg')?>">
			</div>
		</a>
	</div>

	<div id="birthday" class="automargin padder_dark" style="margin-top: 5px; margin-bottom: 5px;">
		<img src="<?= URL::to('assets/comics/merryxmas.png')?>" style="width: 100%; border-radius: 5px;" />
	</div>

	<div id="news">
		<p class="section_header">News &amp; Announcements</p>
		<div class="news_container automargin">
			<div class="news_content">
				<div class="news_header">Nanite Systems Website Launched!</div>
				<div class="news_subheader">22/11/14</div>
				<p>After a long year of running Nanite Systems Comics the website has finally been completed. Working with Maelstrome26 (creator of <a href="http://ps2alerts.com">PS2 Alerts</a>) we built the "fully" functioning website, complete with a few bells and whistles. Below is a quick tour of the website which gives details about what is on each page and how they work.</p>
				<p><b>Home Page</b> - This is the page you are currently on, it consists of the 'latest comic' button which will take you to the most recently made comic, and the 'News and Announcements' section which is where any updates to the to the comic or the website will be made public, where details about the update will be given</p>
				<p><b>Comic Pages</b> - These hold the comics themselves and give you a few options to navigate your way through them. Firstly there are the 'First' and 'Last' buttons which as you could imagine take you to the first and latest comic that have been posted. Then there are the 'Next' and 'Prev' buttons which will take you to the comic before or after the one you are currently on. And finally there is the Archive button which will take you to the archive page which is described below.</p>
				<p><b>Archive</b> - This gives a list of all the comics ever posted, their number, the date they were posted plus a thumbnail image of the comic itself so if you can't remember the comic by name you will still be able to recognise it.</p>
				<p><b>Extras</b> - Here you will find all of the Wallpapers and drawings I have done and downloads to all of them. Aside from them there is all of my animations and other YouTube videos embedded in the page to watch with ease.</p>
				<p><b> Contact &amp; Ideas</b> - Send me your ideas! all ideas are welcome and if I like them they will be used and you could be mentioned. Simply fill in the form and send it my way.</p>
				<p><b>Support the Comic</b> - This will link you directly to my Patreon page, there you can see the rewards and become a patron yourself to support the comic and keep it going.</p>
				<p><b>Store</b> - Currently being worked on, the store will allow you to buy merchandise with designs made by yours truly. I cannot give figures on how much things will be but keep an eye out for future updates about it.</p>
			</div>
			<div class="news_container_left"></div>
			<div class="news_container_right"></div>
		</div>
	</div>
</div>

@stop