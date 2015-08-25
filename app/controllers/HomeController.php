<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	// Cache = 2 days

	protected $layout = 'layouts.master';

	public function index()
	{
		$date = date("Y-m-d H:00:01");
		$data["current"] = DB::table('comics')
		->where('active', 1)
		->where('comicDate', '<', $date)
		->orderBy('dataID', 'desc')
		->take(1)
		->remember(600)
		->get();

		$this->layout->content = View::make('home')->with('data', $data);
	}

	public function comic($comicID)
	{
		$date = date("Y-m-d H:00:01");

		$count = DB::table('comics')
			->where('active', 1)
			->where('comicDate', '<', $date)
			->orderBy('dataID', "desc")
			->take(1)
			->remember(600)
			->get();

		$count = $count[0]->dataID;
		$nextCount = $comicID + 1;
		$prevCount = $comicID - 1;

		if ($nextCount <= $count) // If there is is a next
		{
			$data["next"] = DB::table('comics')
				->where('dataID', $nextCount)
				->where('active', 1)
				->take(1)
				->remember(172800)
				->get();
		}
		else
		{
			$next = FALSE;
		}

		$data["first"] = DB::table('comics')
			->orderBy('dataID', 'asc')
			->take(1)
			->remember(172800)
			->get();
		$data["current"] = DB::table('comics')
			->where('dataID', $comicID)
			->where('active', 1)
			->remember(172800)
			->get();
		$data["prev"] = DB::table('comics')
			->where('dataID', $prevCount)
			->where('active', 1)
			->remember(172800)
			->get();
		$data["last"] = DB::table('comics')
			->orderBy('dataID', "desc")
			->where('active', 1)
			->remember(172800)
			->take(1)
			->get();

		$this->layout->content = View::make('comic')->with('data', $data);
	}

	public function archive()
	{
		$date = date("Y-m-d H:i:s");
		$data["comics"] = DB::table('comics')
			->where('active', 1)
			->where('comicDate', '<', $date)
			->orderBy('comicDate', 'desc')
			->remember(600)
			->get();

		$this->layout->content = View::make('archive')->with('data', $data);
	}

	public function maint()
	{
		$this->layout->content = View::make('maint');
	}


	public function contact()
	{
		$this->layout->content = View::make('contact');
	}

	public function contactSubmit()
	{
		$type = Request::segment(2);

		$input = Input::all();

		$check = Input::get('check');
		$check = strtolower($check);

		if ($check == "terran republic")
		{
			if ($type == "contact")
			{
				Mail::send("emails.contact", $input, function($message)
				{
					$message->from('admin@nanitesystemscomics.com', 'Nanite Systems Comics');
					$message->to('nscomics@outlook.com');
					$message->subject("Website Contact Request");
				});

				return Redirect::to('contact')->with('message', 'Contact Request submitted successfully!');
			}
			else if ($type == "idea")
			{
				Mail::send("emails.idea", $input, function($message)
				{
					$message->from('admin@nanitesystemscomics.com', 'Nanite Systems Comics');
					$message->to('nscomics@outlook.com');
					$message->subject("Website Idea Submission");
				});

				return Redirect::to('contact')->with('message', 'Idea submitted successfully!');
			}
		}
		else
		{
			return Redirect::to('contact')->with('error', 'Human Validation failed. Please try again. Hint: TR.');
		}
	}

	public function store()
	{
		$this->layout->content = View::make('store');
	}

	public function extras()
	{
		$this->layout->content = View::make('extras');
	}

	public function admin()
	{

	}

	public function rss()
	{

	}
}
