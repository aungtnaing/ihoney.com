<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Maincategory;
use DB;
use App\Category;
// use Intervention\Image\ImageManager;
// use Intervention\Image\ImageManagerStatic as Image;
// use File;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		 // $maincategorys = DB::table('maincategory')->orderBy('id','desc')
   //              ->paginate(10);


		$categorys = Category::orderBy('id', 'desc')->paginate(10);
    	// var_dump($categorys);
    	// die();
    	// $user = User::find($request->user()->id);
		return view("dashboard.category.categoryspannel")
		->with("categorys", $categorys);
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$maincategorys = Maincategory::All();		
		return view("dashboard.category.create")->with('maincategorys', $maincategorys);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		// var_dump($request->input("maincategory"));
		// die();

		$this->validate($request,[
			'name' => 'required|max:255',
			'mname' => 'required|max:255',
			]);


		$category = new Category();

		$category->name = $request->input("name");
		$category->mname = $request->input("mname");
		$category->maincategoryid = $request->input("maincategory");
		$category->save();
		return redirect()->route("categorys.index");
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
		$maincategorys = Maincategory::All();	
		$node = array(); 
		foreach($maincategorys as $maincat)
		{
			$node[] = array($maincat->id,$maincat->name);
		}
		
		$category = Category::find($id);

		return view('dashboard.category.edit')->with('maincategorys',$node)->with('category',$category);
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
		$category = Category::find($id);
		if($category->name!=$request->input("name"))
		{
			$this->validate($request,[
				'name' => 'required|unique:category|max:255',
				'mname' => 'required|max:255',
				]);
		}
		else
		{
			$this->validate($request,[
				'name' => 'required|max:255',
				'mname' => 'required|max:255',
				]);
		}
		

		
		$category->name = $request->input("name");
		$category->mname = $request->input("mname");
		$category->maincategoryid = $request->input("maincategory");
		$category->save();
		
		return redirect()->route("categorys.index");
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

		Category::destroy($id);

		return redirect()->route("categorys.index");
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
