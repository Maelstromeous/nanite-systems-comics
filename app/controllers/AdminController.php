<?php

class AdminController extends BaseController {

	protected $layout = 'layouts.admin';

	public function index()
	{
		$this->layout->content = View::make('admin/adminindex');
	}

	public function comic($action, $ID = null) // Action passed by the routing system
	{
		switch ($action)
		{
			case "list":
			{
				$comics = DB::table('comics')->orderBy('dataID', "desc")->get();
				return $this->layout->content = View::make('admin/comic/listcomics')->with(array('comics' => $comics));
				break;
			}
			case "add":
			{
				return $this->layout->content = View::make('admin/comic/addcomic');

				break;
			}
			case "cropper": // Chuck em to the cropper
			{
				$input = Input::all();

				if (empty($input["comicTime"]))
				{
					$input["comicTime"] = "00:00:00";
				}

				$destinationPath = "/var/www/nanitesystemscomics.com/html/public/uploads/";

				$input["imageName"] = Input::file('image')->getClientOriginalName();
				$input["imagePath"] = $destinationPath.$input["imageName"];
				$input["destinationPath"] = $destinationPath;
				$input["webPath"] = URL::to('uploads/'.$input["imageName"]);
				Input::file('image')->move($destinationPath, $input["imageName"]);

				$img = Image::make($input["imagePath"]);

				// resize the image to a width of 300 and constrain aspect ratio (auto height)
				$img->resize(730, null, function ($constraint) {
				    $constraint->aspectRatio();
				});

				$img->save($input["imagePath"]);

				/*echo '<pre>';
					print_r($input);
				echo '</pre>';*/

				$rules = array('comicTitle' => 'required', 'comicDate' => 'required', 'image' => 'required');

				$validator = Validator::make($input, $rules);

				if ($validator->fails())
				{
					return Redirect::to('admin/comic/add')->withErrors($validator)->withInput();
				}
				else
				{
					$session = Session::get("input");

					if (!empty($session))
					{
						Session::forget("input"); // Wipe it
					}

					unset($input["image"]); // Loose image info to prevent serialization errors

					Session::put("input", $input); // Commit to session for use later
					return $this->layout->content = View::make('admin/comic/addimage')->with('comic', $input);
				}

				break;
			}
			case "commit": // Add the comic to the database
			{
				$input = Session::get('input');
				$input["imageDetails"] = Input::all();

				$source = $input["imagePath"]; // Source Image as generated in previous script
				$destination = "/var/www/nanitesystemscomics.com/html/public/assets/comics/"; // Where it should be going

				/*echo '<pre>INPUT';
					print_r($input);
				echo '</pre>';*/

				$x = $input["imageDetails"]["dataX"];
				$y = $input["imageDetails"]["dataY"];
				$w = $input["imageDetails"]["dataWidth"];
				$h = $input["imageDetails"]["dataHeight"];

				$Ax = $input["imageDetails"]["dataXArchive"];
				$Ay = $input["imageDetails"]["dataYArchive"];
				$Aw = $input["imageDetails"]["dataWidthArchive"];
				$Ah = $input["imageDetails"]["dataHeightArchive"];

				$imgL = Image::make($source);
				$imgA = Image::make($source);

				$imgL->crop($w, $h, $x, $y);
				$imgA->crop($Aw, $Ah, $Ax, $Ay);

				// Add database record to database to get ID

				$ID = DB::table('comics')->insertGetID(
					array(
						'comicTitle' => $input["comicTitle"],
						'comicDate' => $input["comicDate"],
						'comicURL' => 'TOCHANGE',
						'active' => 1
					)
				);

				DB::table('comics')->where('dataID', $ID)->update(array('comicURL' => $ID.".jpg"));

				//DB::table('comics')->where('dataID', $ID)->delete(); // Testing only

				$imgL->save($destination."thumbs/latest/{$ID}_latest.jpg");
				$imgA->save($destination."thumbs/{$ID}.jpg");

				/*echo '<pre>';
					print_r($destination.$ID.".jpg");
				echo '</pre>';*/

				if (File::move($source, $destination.$ID.".jpg"))
				{
					Redirect::to("comic/{$ID}");
				}
				else
				{

				}

				break;
			}
			case "edit":
			{
				$comic = DB::table('comics')->where('dataID', $ID)->get();
				return $this->layout->content = View::make('admin/comic/editcomic')->with(array('comic' => $comic));
				break;
			}
			case "delete":
			{
				DB::table('comics')->where('dataID', $ID)->delete();

				$filepathC = "/var/www/nanitesystemscomics.com/html/public/assets/comics/".$ID.".jpg";
				$filepathT = "/var/www/nanitesystemscomics.com/html/public/assets/comics/thumbs/".$ID.".jpg";
				$filepathL = "/var/www/nanitesystemscomics.com/html/public/assets/comics/thumbs/latest/".$ID."_latest.jpg";

				$del1 = unlink($filepathC);
				$del2 = unlink($filepathT);
				$del3 = unlink($filepathL);

				if ($del1 and $del2 and $del3 == TRUE)
				{
					Cache::flush();

					return $this->layout->content = "COMIC #".$ID." DELETED! Cache also flushed.";
				}
				else
				{
					return $this->layout->content = "COMIC #".$ID." DELTION WAS NOT SUCCESSFUL! CONTACT MAEL!";
				}
				break;
			}
		}
	}

	public function flush()
	{
		Cache::flush();

		echo "Cache flushed!";
	}

	public function phpinfo()
	{
		echo phpinfo();
	}

	public function login()
	{
		$this->layout->content = View::make('admin/login');
	}

	public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
			'username' => 'required', // make sure the email is an actual email
			'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Redirect::to('admin/login')
				->withErrors($validator) // send back all errors to the login form
				->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'name' 	=> Input::get('username'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the secure section or whatever
				return Redirect::to('admin');

			} else {

				// validation not successful, send back to form
				return Redirect::to('admin/login');
			}
		}
	}

	public function logout()
	{
		Auth::logout();

		Session::flash('message', 'You have been logged out');

		return Redirect::to('admin/login');
	}

	public function hash()
	{
		$password = Hash::make('korogosisawesome');

		echo $password;
	}
}