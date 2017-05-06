<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Products;
use DB;

use File;
use Input;

use App\Productdetails;



class ProductdetailController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		 

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

	 public function customcreate($id)
    {
        // echo $id;
        // die();
        return view("dashboard.products.productdetails.create")->with('productid', $id);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		

		$this->validate($request,[
			'photourl1' => 'required',
			'productid' => 'required|max:255',
			
			
			]);


		$productdetail = new Productdetails();
		$imagePath = public_path() . '/images/products/' . $request->input("productid") . "/productdetails";
		$lastid = DB::table('productdetails')->select('id')->orderBy('id', 'DESC')->first();
		if($lastid!=null)
		{
		$lastid = $lastid->id + 1;
		}
		else
		{
		$lastid = 1;	
		}
		
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
				$photourl1 = "/images/products/" . $request->input("productid") . "/productdetails" . '/photos/' .  $name;
			
			
			}

		}

		$productdetail->productdetailcode = $request->input("productdetailcode");
		$productdetail->productid = $request->input("productid");

		$productdetail->active = 0;
		if (Input::get('active') === '1'){$productdetail->active = 1;}

		$productdetail->sizes = $request->input("sizes");
		$productdetail->sizeno = $request->input("sizeno");
		$productdetail->description = $request->input("description");
		$productdetail->photourl1 = $photourl1;
		
		$productdetail->save();
		return redirect()->route("products.edit", $request->input("productid"));
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
		$productdetail = Productdetails::find($id);
		return view('dashboard.products.productdetails.edit')
				->with('productdetail',$productdetail);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
	
		
		$productdetail = Productdetails::find($id);
		
		
		$imagePath = public_path() . '/images/products/' . $productdetail->productid . "/productdetails";
		
		
		$input = $request->all();
		$destinationPath = $imagePath . '/photos';
		
		
	

		$photourl1 = $productdetail->photourl1;
		
	

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

				$name =  time()  . $id . '.' . $input['photourl1']->getClientOriginalExtension();
				File::exists($destinationPath) or File::makeDirectory($destinationPath, 0777, true, true);
				Input::file('photourl1')->move($destinationPath, $name); // uploading file to given path
				$photourl1 = "/images/products/" . $productdetail->productid . "/productdetails" . '/photos/' .  $name;
			
			}

		}
		
		$productdetail->productdetailcode = $request->input("productdetailcode");
		
		

		$productdetail->active = 0;
		if (Input::get('active') === ""){$productdetail->active = 1;}
		$productdetail->sizes = $request->input("sizes");
		$productdetail->sizeno = $request->input("sizeno");
		$productdetail->description = $request->input("description");
		
	
		$productdetail->photourl1 = $photourl1;
		
		$productdetail->save();
		return redirect()->route("products.edit", $productdetail->productid);
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
		$productdetail = Productdetails::find($id);

		$id1 = $productdetail->productid;

		$photourl1 = $productdetail->photourl1;
		

			if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}


		Productdetails::destroy($id);

		return redirect()->route("products.edit", $id1);
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
