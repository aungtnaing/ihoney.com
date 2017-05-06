<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brands;
use DB;

use File;
use Input;

class BrandsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		 // $maincategorys = DB::table('maincategory')->orderBy('id','desc')
   //              ->paginate(10);


		$brands = Brands::orderBy('id', 'desc')->paginate(5);
    	// $user = User::find($request->user()->id);
		return view("dashboard.brands.brandspannel")
		->with("brands", $brands);
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view("dashboard.brands.create");

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
			'mname' => 'required|max:255',
			
			
			]);


		$brand = new Brands();
		$imagePath = public_path() . '/images/brands/';
		$lastid = DB::table('brands')->select('id')->orderBy('id', 'DESC')->first();

		if($lastid!=null)
		{
		$lastid = $lastid->id + 1;
		}
		else
		{
		$lastid = 1;	
		}
		// die();
		
		$input = $request->all();
		$destinationPath = $imagePath . '/photos';
		
		// var_dump(Input::get('active'));

		// echo $destinationPath;
		// die();
		$photourl1 = "";
		
		
		if(Input::file('photourl1')!="")
		{
			if(Input::file('photourl1')->isValid())
			{
				$name =  time()  . $lastid . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/brands/photos/" .  $name;
			
			}

		}

		$brand->name = $request->input("name");
		$brand->mname = $request->input("mname");
		// $brand->active = 0;
		// if (Input::get('active') === '1'){$brand->active = 1;}

		$brand->photourl1 = $photourl1;
		$brand->description = $request->input("description");
		$brand->save();
		return redirect()->route("brands.index");
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
		
		$brand = Brands::find($id);
		return view('dashboard.brands.edit')->with('brand',$brand);
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

		$brand = Brands::find($id);
			
		$this->validate($request,[
			'name' => 'required|max:255',
			'mname' => 'required|max:255',
		
			
			]);
		
		$imagePath = public_path() . '/images/brands/';
		// $lastid = DB::table('collections')->select('id')->orderBy('id', 'DESC')->first();
		// echo $directory->id+1;
		// die();
		
		$input = $request->all();
		$destinationPath = $imagePath . '/photos';
		
		// var_dump(Input::get('active'));

		$photourl1 = $brand->photourl1;
		
		
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

				$name =  time() . $id . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/brands/photos/" .  $name;
			}

		}
		
		

		$brand->name = $request->input("name");
		$brand->mname = $request->input("mname");
		// $brand->active = 0;
		// if (Input::get('brand') === ""){$brand->active = 1;}

		$brand->photourl1 = $photourl1;
		$brand->description = $request->input("description");
		$brand->save();
		return redirect()->route("brands.index");
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
			$brand = Brands::find($id);

		$photourl1 = $brand->photourl1;
		

			if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}


		Brands::destroy($id);

		return redirect()->route("brands.index");
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
