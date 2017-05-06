<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use DB;
use Hash;
use Auth;
use Config;
use View;
use File;
use Input;
use App\Maincategory;

class ProfilesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		// echo "HELLLLLLLLL";
		// die();
		// return view('dashboard.userprofile');
	
	}

	public function dashboarduserindex(Request $request)
	{

		// return view('dashboard.userprofile');
		// echo "hello dsh";
		// die();

		$user = User::find($request->user()->id);

		return view('dashboard.users.userprofile')->with('user',$user);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	
/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
public function store(Request $request)
{
	
	// echo "new user";
	// die();
	$this->validate($request,[
		'name' => 'required|max:255',
				// 'address' => 'required',
		'email' => 'required|unique:users|max:255',
		'ph1' => 'required',
		'password' => 'required',
		]);
	
	$user = new User();
	

	
	$user->name = $request->input("name");
		// $user->mname = $request->input("mname");
	
	$user->address = $request->input("address");
	$user->ph1 = $request->input("ph1");
		// $user->ph2 = $request->input("ph2");
	$user->email = $request->input("email");
	$user->password = Hash::make($request->input("password"));
		// $user->photourl = $photourl;
	$user->save();

	
	$credentials = array(
		'email' => $request->input("email"),
		'password' => $request->input("password")
		);

	if (Auth::attempt($credentials)) {
		return redirect()->action('HomeController@index');
	}
	

	

}

	/**
	 * Display th$userid = $request->user()->id;specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// //
		// echo "edit";
		// die();
			View::share('headerstyle', Config::get('constants.headerstyle'));
			$maincategorys = Maincategory::all(); 	
    	View::share('maincategorys', $maincategorys);
		if($id==Auth::user()->id)
		{
			$user = User::find($id);

			return view('auth.profile')->with('user',$user);
		}
		else
		{
			return redirect()->action('HomeController@index');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		
		$userid = $request->user()->id;
		$user = User::find($userid);

		if($user->email!=$request->user()->email)
		{
			$this->validate($request,[
				'name' => 'required|max:255',
				// 'address' => 'required',
				'email' => 'required|unique:users|max:255',
				'ph1' => 'required',
				'password' => 'required',
				]);
		}
		else
		{
			$this->validate($request,[
				'name' => 'required|max:255',
				// 'address' => 'required',
				// 'email' => 'required|unique:users|max:255',
				'ph1' => 'required',
				'password' => 'required',
				]);

		}
		
		
		$input = $request->all();
		$photourl = $request->user()->photourl;


		if(Input::file('photourl')!="")
		{
			if(Input::file('photourl')->isValid())
			{


				$name =  time() . '-' . $request->user()->id . '.' . $input['photourl']->getClientOriginalExtension();
				$imagePath = public_path() . '/images/users/';
				$directory = $userid;

				if($photourl!=""){
					if (file_exists(public_path() .$photourl)) {

						
						unlink(public_path() . $photourl);
					}
				}
				
				$destinationPath = $imagePath . $directory . '/profilePictures';

				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);


			Input::file('photourl')->move($destinationPath, $name); // uploading file to given path

			$photourl = "/images/users/" . $directory . '/profilePictures/' .  $name;
		}
	}
	$user->name = $request->input("name");
	$user->mname = $request->input("mname");
	
	$user->address = $request->input("address");
	$user->ph1 = $request->input("ph1");
	$user->ph2 = $request->input("ph2");
	$user->email = $request->input("email");
	$user->password = Hash::make($request->input("password"));
	$user->photourl = $photourl;
	$user->save();

	if($id==0)
		{return redirect()->action('DashboardController@index');}
	else
		{return redirect()->action('HomeController@index');}
	
}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function rrmdir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir") 
						rrmdir($dir."/".$object); 
					else unlink   ($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
		}
	}

}



// public function store(Request $request)
// 	{
// 		//
// 		 $userid = $request->user()->id;
//         $media = new Media;
//         $mediaid = 0;
//         $input = $request->all();

// 	    if(array_key_exists('media', $input))
//         {
// 	        $image = Image::make($input['media']->getRealPath());

// 	        $name =  time() . '-' . $request->user()->id . '.' . $input['media']->getClientOriginalExtension();
// 	        $imagePath = public_path() . '/images/users/';
// 	        $directory = $userid;

// 	        // check if directory exists, if not create the directory
// 	        $this->rrmdir($imagePath . $directory . '/profilePictures');

// 	        $affectedRows = Media::where('userid', '=', $userid)->delete();

// 	        File::exists($imagePath . $directory . '/profilePictures') or File::makeDirectory($imagePath . $directory . '/profilePictures', 0777, true, true);



// 	        $image->save($imagePath . $directory . '/profilePictures/' . $name)
// 	              ->fit(176, 176)
// 	              ->save($imagePath . $directory . '/profilePictures/' . '176thumb-' . $name)
// 	              ->fit(50, 50)
// 	              ->save($imagePath . $directory . '/profilePictures/' . '50thumb-' . $name)
// 	              ->fit(30, 30)
// 	              ->save($imagePath . $directory . '/profilePictures/' . '30thumb-' . $name);
// 	        // save to database
// 	        $media->pathurl = $name;
// 	        $media->mediatype = $input['media']->getMimeType();
// 	        $media->userid = $userid;
// 	        $media->save();
// 	        $mediaid = $media->id;
//         }       
//         $user = User::find($userid);

// 		if($mediaid!=0)$user->mediaid = $media->id;

// 		$user->save();

//         // return redirect()->route("profiles.show",$userid);
//         // return redirect()->route()->back();	
//         return redirect()->action('HomeController@index');
// 	}



// public function show($id)
// 	{

// 		echo $id;
// 		die();

// 			$media =DB::table('medias')
//         			->select('medias.*')
//         			->where('medias.userid','=',$id)
//                     ->get(); 


// 		$user = User::where('id','=',$id)->get();

// 		// var_dump($media[0]);
// 		// die();

// 		if($media!=null)
// 		{
// 			return view('auth.profile')->with('oldmedia',$media[0])->with('user',$user[0]);
// 		}
// 		else
// 		{
// 			// echo "no";
// 			$media = new Media();
// 			$media->userid=0;

// 			return view('auth.profile')->with('oldmedia',$media[0])->with('user',$user[0]);
// 		}	
// 	}