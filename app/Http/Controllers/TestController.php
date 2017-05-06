<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Maincategory;
use DB;
use App\Category;
use App\Wishlist;
// use Intervention\Image\ImageManager;
// use Intervention\Image\ImageManagerStatic as Image;
// use File;

class TestController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		 
		$cats = Maincategory::with('Categorys')->where('id',1)->get();
		 foreach ($cats as $cat) {
		 	# code...
		 	echo $cat->name;
		 	echo "<br>";
		 }
		die();

		// $cats = Category::with('Maincategory')->where('id',1)->get();
		
		//  foreach ($cats as $cat) {
		//  	# code...
		//  	echo $cat->name;
		//  	echo "<br>";
		//  }
		// die();
		
		$strt = "hello world";

		$stre = substr($strt, 0, 5);
		echo $strt;
		echo "<br>";
		echo $stre;
		die();

		 $catalls = Maincategory::All();
		 
		 // var_dump($catalls[1]->categorys);
		 // die();

		 foreach ($catalls[0]->categorys as $category) {
		 	# code...
		 	echo $category->name;
		 	echo "<br>";
		 }
		 die();
		 $categorys = Maincategory::find(1)->categorys;
		 foreach ($categorys as $category) {
    
				echo $category->name;
				echo "<br>";
				}

				
				$cat = Category::find(2);
				echo $cat->maincategory->name;

				$cats = Category::All();

				foreach ($cats as $cat) {
    			echo $cat->name;
				echo "<br>";
				echo $cat->maincategory->name;
				echo "<br>";
				}
				



				die();
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 public function likeindex(Request $request) {
    // Getting all post data
	 // 	$id = $_POST['id'];
	 // 	$msg = $id;

	 // 	$wishlist = new Wishlist();
		// $wishlist->productid =  $id;
		// $wishlist->userid = $request->user()->id;
		// $wishlist->save();


      return response()->json(array('msg'=> $msg), 200);
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
