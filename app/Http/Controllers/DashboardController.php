<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\User;
use DB;
use Input;	
use App\Bgphoto;

// use Intervention\Image\ImageManager;
// use Intervention\Image\ImageManagerStatic as Image;
// use File;

class DashboardController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		// echo "hello world d";
		// die();
		$user = User::find($request->user()->id);
		return view('dashboard.home')->with('user',$user);	
	}

	public function bgchange()
	{
		// echo "hello world d";
		// die();
		$bgphoto = Bgphoto::find(1);
		return view('dashboard.bgphoto.bgphotopannel')->with('bgphoto',$bgphoto);	
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
	public function store(Request $request)
	{
		//
		
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
		$bgphoto = Bgphoto::find(1);
						
		$input = $request->all();
		$destinationPath = public_path() . '/images/home/';
		
		// var_dump(Input::get('active'));

		$logo = $bgphoto->logo;
		$newarrivels = $bgphoto->newarrivels;
		$collections = $bgphoto->collections;
		$lovelys =$bgphoto->lovelys;
		$ourspecialselection = $bgphoto->specialselection;
		$newcollection = $bgphoto->newcollection;
		$businesspartner = $bgphoto->businesspartner;
		$footer = $bgphoto->footer;
		if(Input::file('logo')!="")
		{
			if(Input::file('logo')->isValid())
			{
				if($logo!="")
				{
					if(file_exists(public_path() .$logo))
					{
						unlink(public_path() . $logo);
					}
				}

				$name = 'logo' . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('logo')->move($destinationPath, $name); // uploading file to given path
				$logo = "/images/home/" .  $name;
			}

		}
		if(Input::file('newarrivels')!="")
		{
			if(Input::file('newarrivels')->isValid())
			{
				
				if($newarrivels!="")
				{
					if(file_exists(public_path() .$newarrivels))
					{
						unlink(public_path() . $newarrivels);
					}
				}
				$name =  'newarrivels' . '.' . $input['newarrivels']->getClientOriginalExtension();
				Input::file('newarrivels')->move($destinationPath, $name); // uploading file to given path
				$newarrivels = "/images/home/" . $name;
			}
		}

		if(Input::file('collections')!="")
		{
			if(Input::file('collections')->isValid())
			{
				
				if($collections!="")
				{
					if(file_exists(public_path() .$collections))
					{
						unlink(public_path() . $collections);
					}
				}
				$name =  'collections' . '.' . $input['collections']->getClientOriginalExtension();
				Input::file('collections')->move($destinationPath, $name); // uploading file to given path
				$collections = "/images/home/" . $name;
			}
		}

		if(Input::file('lovelys')!="")
		{
			if(Input::file('lovelys')->isValid())
			{
				
				if($lovelys!="")
				{
					if(file_exists(public_path() .$lovelys))
					{
						unlink(public_path() . $lovelys);
					}
				}
				$name =  'lovelys' . '.' . $input['lovelys']->getClientOriginalExtension();
				Input::file('lovelys')->move($destinationPath, $name); // uploading file to given path
				$lovelys = "/images/home/" . $name;
			}
		}

		if(Input::file('specialselection')!="")
		{
			if(Input::file('specialselection')->isValid())
			{
				
				if($ourspecialselection!="")
				{
					if(file_exists(public_path() .$ourspecialselection))
					{
						unlink(public_path() . $ourspecialselection);
					}
				}
				$name =  'ourspecialselection' . '.' . $input['specialselection']->getClientOriginalExtension();
				Input::file('specialselection')->move($destinationPath, $name); // uploading file to given path
				$ourspecialselection = "/images/home/" . $name;
			}
		}

		if(Input::file('newcollection')!="")
		{
			if(Input::file('newcollection')->isValid())
			{
				
				if($newcollection!="")
				{
					if(file_exists(public_path() .$newcollection))
					{
						unlink(public_path() . $newcollection);
					}
				}
				$name =  'newcollection' . '.' . $input['newcollection']->getClientOriginalExtension();
				Input::file('newcollection')->move($destinationPath, $name); // uploading file to given path
				$newcollection = "/images/home/" . $name;
			}
		}

		if(Input::file('businesspartner')!="")
		{
			if(Input::file('businesspartner')->isValid())
			{
				
				if($businesspartner!="")
				{
					if(file_exists(public_path() .$businesspartner))
					{
						unlink(public_path() . $businesspartner);
					}
				}
				$name =  'businesspartner' . '.' . $input['businesspartner']->getClientOriginalExtension();
				Input::file('businesspartner')->move($destinationPath, $name); // uploading file to given path
				$businesspartner = "/images/home/" . $name;
			}
		}

		if(Input::file('footer')!="")
		{
			if(Input::file('footer')->isValid())
			{
				
				if($footer!="")
				{
					if(file_exists(public_path() .$footer))
					{
						unlink(public_path() . $footer);
					}
				}
				$name =  'footer' . '.' . $input['footer']->getClientOriginalExtension();
				Input::file('footer')->move($destinationPath, $name); // uploading file to given path
				$footer = "/images/home/" . $name;
			}
		}
		

		$bgphoto->logo = $logo;
		$bgphoto->newarrivels = $newarrivels;
		$bgphoto->collections = $collections;
		$bgphoto->lovelys = $lovelys;
		$bgphoto->specialselection = $ourspecialselection;
		$bgphoto->newcollection = $newcollection;
		$bgphoto->businesspartner = $businesspartner;
		$bgphoto->footer = $footer;
		$bgphoto->save();
		return redirect()->action('DashboardController@bgchange');
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
