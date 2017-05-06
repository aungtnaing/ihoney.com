<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mainslide;
use DB;

use File;
use Input;

class MainslideController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		 // $maincategorys = DB::table('maincategory')->orderBy('id','desc')
   //              ->paginate(10);


		$mainslides = Mainslide::orderBy('id', 'desc')->paginate(5);
    	// $user = User::find($request->user()->id);
		return view("dashboard.mainslide.mainslidespannel")
		->with("mainslides", $mainslides);
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view("dashboard.mainslide.create");

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		

		$this->validate($request,[
			'name' => 'required|max:255',
			'title' => 'required|max:255',
			'special' => 'required|max:255',
			
			]);


		$mainslide = new Mainslide();
		$imagePath = public_path() . '/images/mainslide/';
		$lastid = DB::table('mainslide')->select('id')->orderBy('id', 'DESC')->first();
		if($lastid!=null)
		{
		$lastid = $lastid->id + 1;
		}
		else
		{
		$lastid = 1;	
		}
		$directory = $lastid;
		$input = $request->all();
		$destinationPath = $imagePath . $directory . '/photos';
		
		// var_dump(Input::get('active'));

		// echo $destinationPath;
		// die();
		$photourl1 = "";
		$photourl2 = "";
		$photourl3 = "";
		
		if(Input::file('photourl1')!="")
		{
			if(Input::file('photourl1')->isValid())
			{
				$name =  time()  . '-mainslide' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/mainslide/" . $directory . '/photos/' .  $name;
			
				if(Input::file('photourl2')!="")
				{
					if(Input::file('photourl2')->isValid())
					{
						$name =  time() . '-detail1' . '.' . $input['photourl2']->getClientOriginalExtension();
						Input::file('photourl2')->move($destinationPath, $name); // uploading file to given path
						$photourl2 = "/images/mainslide/" . $directory . '/photos/' .  $name;
					}
				}

				if(Input::file('photourl3')!="")
				{
					if(Input::file('photourl3')->isValid())
					{
						$name =  time() . '-detail2' . '.' . $input['photourl3']->getClientOriginalExtension();
						Input::file('photourl3')->move($destinationPath, $name); // uploading file to given path

						$photourl3 = "/images/mainslide/" . $directory . '/photos/' .  $name;
					}
				}
			}

		}

		$mainslide->name = $request->input("name");
		$mainslide->title = $request->input("title");
		$mainslide->special = $request->input("special");

		$mainslide->fburl = $request->input("fburl");
		$mainslide->wwwurl = $request->input("wwwurl");

		$mainslide->slideno = $request->input("slideno");

		$mainslide->active = 0;
		if (Input::get('active') === '1'){$mainslide->active = 1;}

		$mainslide->address = $request->input("address");		
		$mainslide->ph1 = $request->input("ph1");
		$mainslide->ph2 = $request->input("ph2");
		$mainslide->description = $request->input("description");
		$mainslide->photourl1 = $photourl1;
		$mainslide->photourl2 = $photourl2;
		$mainslide->photourl3 = $photourl3;
		$mainslide->save();
		return redirect()->route("mainslides.index");
	}

	/**
	 * Display the specified resource.
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
		//
		
		$mainslide = Mainslide::find($id);
		return view('dashboard.mainslide.edit')->with('mainslide',$mainslide);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
		//
		//  var_dump(Input::get('active'));
		// if (Input::get('active') === "")
		// {
		// 	echo "1";
		// }
		// die();

		$mainslide = Mainslide::find($id);
			
		$this->validate($request,[
			'name' => 'required|max:255',
			'title' => 'required|max:255',
			'special' => 'required|max:255',
			
			]);
		
		$imagePath = public_path() . '/images/mainslide/';
		// $lastid = DB::table('mainslide')->select('id')->orderBy('id', 'DESC')->first();
		// echo $directory->id+1;
		// die();
		$directory = $id;

		$input = $request->all();
		$destinationPath = $imagePath . $directory . '/photos';
		
		// var_dump(Input::get('active'));

		$photourl1 = $mainslide->photourl1;
		$photourl2 = $mainslide->photourl2;
		$photourl3 = $mainslide->photourl3;
		
		if(Input::file('photourl1')!="")
		{
			if(Input::file('photourl1')->isValid())
			{
				if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}

				$name =  time() . '-mainslide' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/mainslide/" . $directory . '/photos/' .  $name;
			}

		}
		if(Input::file('photourl2')!="")
		{
			if(Input::file('photourl2')->isValid())
			{
				
				if($photourl2!="")
				{
					if(file_exists(public_path() .$photourl2))
					{
						unlink(public_path() . $photourl2);
					}
				}
				$name =  time() . '-detail1s' . '.' . $input['photourl2']->getClientOriginalExtension();
				Input::file('photourl2')->move($destinationPath, $name); // uploading file to given path
				$photourl2 = "/images/mainslide/" . $directory . '/photos/' .  $name;
			}
		}

		if(Input::file('photourl3')!="")
		{
			if(Input::file('photourl3')->isValid())
			{
				if($photourl3!="")
				{
					if(file_exists(public_path() .$photourl3))
					{
						unlink(public_path() . $photourl3);
					}
				}

				$name =  time() . '-detail2' . '.' . $input['photourl3']->getClientOriginalExtension();
				Input::file('photourl3')->move($destinationPath, $name); // uploading file to given path

				$photourl3 = "/images/mainslide/" . $directory . '/photos/' .  $name;
			}
		}
		

		$mainslide->name = $request->input("name");
		$mainslide->title = $request->input("title");
		$mainslide->special = $request->input("special");

		$mainslide->fburl = $request->input("fburl");
		$mainslide->wwwurl = $request->input("wwwurl");

		$mainslide->slideno = $request->input("slideno");

		$mainslide->active = 0;
		if (Input::get('active') === ""){$mainslide->active = 1;}

		$mainslide->address = $request->input("address");		
		$mainslide->ph1 = $request->input("ph1");
		$mainslide->ph2 = $request->input("ph2");
		$mainslide->description = $request->input("description");
		$mainslide->photourl1 = $photourl1;
		$mainslide->photourl2 = $photourl2;
		$mainslide->photourl3 = $photourl3;
		$mainslide->save();
		return redirect()->route("mainslides.index");
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
			$mainslide = Mainslide::find($id);

		$photourl1 = $mainslide->photourl1;
		$photourl2 = $mainslide->photourl2;
		$photourl3 = $mainslide->photourl3;

			if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}


				if($photourl2!="")
				{
					if(file_exists(public_path() .$photourl2))
					{
						unlink(public_path() . $photourl2);
					}
				}

				if($photourl3!="")
				{
					if(file_exists(public_path() .$photourl3))
					{
						unlink(public_path() . $photourl3);
					}
				}
		Mainslide::destroy($id);

		return redirect()->route("mainslides.index");
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
