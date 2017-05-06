<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Collections;
use DB;

use File;
use Input;

use App\Products;

use App\Category;
use App\Maincategory;
use App\Bgphoto;

class CollectionsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		 // $maincategorys = DB::table('maincategory')->orderBy('id','desc')
   //              ->paginate(10);


		$collections = Collections::orderBy('id', 'desc')->paginate(5);
		// ->orderBy('id','desc');
    	// $user = User::find($request->user()->id);
		return view("dashboard.collection.collectionspannel")
		->with("collections", $collections);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function collectionlist(Request $request)
	{
		 // $maincategorys = DB::table('maincategory')->orderBy('id','desc')
   //              ->paginate(10);

			$maincategorys = Maincategory::all(); 

			$bgphoto = Bgphoto::find(1);

			$lastproduct = Products::where('active',1)->orderBy('id', 'desc')->first();

			$bestsellerproducts = Products::where('active',1)
			->where('bestseller', 1)
			->orderBy('id','desc')
			->take(3)
			->get();


		$collections = Collections::orderBy('id', 'desc')->paginate(5);
		// ->orderBy('id','desc');
    	// $user = User::find($request->user()->id);
		return view("pages.collectionlist")
			->with('bgphoto', $bgphoto)
			->with('bestsellerproducts', $bestsellerproducts)
			->with('maincategorys',$maincategorys)
			->with('lastproduct', $lastproduct)
			->with("collections", $collections);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view("dashboard.collection.create");

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


		$collection = new Collections();
		$imagePath = public_path() . '/images/collections/';
		$lastid = DB::table('collections')->select('id')->orderBy('id', 'DESC')->first();

		$lastid = $lastid->id + 1;
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
				$photourl1 = "/images/collections/photos/" .  $name;
			
			}

		}

		$collection->name = $request->input("name");
		$collection->mname = $request->input("mname");
		$collection->description = $request->input("description");

		$collection->photourl1 = $photourl1;

		$collection->save();
		return redirect()->route("collections.index");
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
		
		$collection = Collections::find($id);
		return view('dashboard.collection.edit')->with('collection',$collection);
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

		$collection = Collections::find($id);
			
		$this->validate($request,[
			'name' => 'required|max:255',
			'mname' => 'required|max:255',
		
			
			]);
		
		$imagePath = public_path() . '/images/collections/';
		// $lastid = DB::table('collections')->select('id')->orderBy('id', 'DESC')->first();
		// echo $directory->id+1;
		// die();
		
		$input = $request->all();
		$destinationPath = $imagePath . '/photos';
		
		// var_dump(Input::get('active'));

		$photourl1 = $collection->photourl1;
		
		
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
				$photourl1 = "/images/collections/photos/" .  $name;
			}

		}
		
		

		$collection->name = $request->input("name");
		$collection->mname = $request->input("mname");
		$collection->description = $request->input("description");

		$collection->photourl1 = $photourl1;
	
		$collection->save();
		return redirect()->route("collections.index");
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
			$collection = Collections::find($id);

		$photourl1 = $collection->photourl1;
		

			if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}


		Collections::destroy($id);

		return redirect()->route("collections.index");
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
