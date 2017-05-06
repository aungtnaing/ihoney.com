<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Products;
use DB;

use File;
use Input;
use App\Category;
use App\Maincategory;
use App\Brands;
use App\Collections;
use App\Shops;
use App\Productdetails;
use App\User;



use App\Wishlist;


class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		 // $maincategorys = DB::table('maincategory')->orderBy('id','desc')
   //              ->paginate(10);


		$products = Products::orderBy('id', 'desc')->paginate(5);
    	// $user = User::find($request->user()->id);
		return view("dashboard.products.productspannel")
		->with("products", $products);
	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$categorys = Category::orderBy('name','asc')->get();	
		$collections = Collections::orderBy('name','asc')->get();
		$shops = Shops::orderBy('name','asc')->get();
		$brands = Brands::orderBy('name','asc')->get();
		return view("dashboard.products.create")
		->with('categorys',$categorys)
		->with('collections',$collections)
		->with('shops',$shops)
		->with('brands',$brands);

	}

	

		/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function wishliststore(Request $request)
	{
		

	$id = $_POST['id'];
	 	// $msg = $id;

	 	$wishlist = new Wishlist();
		$wishlist->productid =  $id;
		$wishlist->userid = $request->user()->id;
		$wishlist->save();
	}


		/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function wishlistcancel(Request $request)
	{
		

		$id = $_POST['id'];
	 	// $msg = $id;

	 	$wishlist = Wishlist::where('productid', $id)->delete();
		
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
			'productcode' => 'required|max:255',
			
			]);


		$product = new Products();
		$imagePath = public_path() . '/images/products/';
		$lastid = DB::table('products')->select('id')->orderBy('id', 'DESC')->first();
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
				$photourl1 = "/images/products/" . $directory . '/photos/' .  $name;

				if(Input::file('photourl2')!="")
				{
					if(Input::file('photourl2')->isValid())
					{
						$name =  time() . '-detail1' . '.' . $input['photourl2']->getClientOriginalExtension();
						Input::file('photourl2')->move($destinationPath, $name); // uploading file to given path
						$photourl2 = "/images/products/" . $directory . '/photos/' .  $name;
					}
				}

				if(Input::file('photourl3')!="")
				{
					if(Input::file('photourl3')->isValid())
					{
						$name =  time() . '-detail2' . '.' . $input['photourl3']->getClientOriginalExtension();
						Input::file('photourl3')->move($destinationPath, $name); // uploading file to given path

						$photourl3 = "/images/products/" . $directory . '/photos/' .  $name;
					}
				}
			}

		}

		$product->name = $request->input("name");
		$product->mname = $request->input("mname");
		$product->productcode = $request->input("productcode");

		$product->categoryid = $request->input("category");
		$product->collectionid = $request->input("collection");

		$product->ourshopid = $request->input("shop");

		$product->active = 0;
		if (Input::get('active') === '1'){$product->active = 1;}

		$product->new = 0;
		if (Input::get('new') === '1'){$product->new = 1;}

		$product->brandid = $request->input("brand");		
		
		$product->omprice = $request->input("omprice");
		$product->mprice = $request->input("mprice");	

		$product->otprice = $request->input("otprice");	
		$product->tprice = $request->input("tprice");	

		$product->oiprice = $request->input("oiprice");	
		$product->iprice = $request->input("iprice");					
		
		$product->discount = $request->input("discount");
		$product->description = $request->input("description");
		$product->photourl1 = $photourl1;
		$product->photourl2 = $photourl2;
		$product->photourl3 = $photourl3;
		$product->save();
		return redirect()->route("products.index");
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
		$productdetails = Productdetails::where('productid',$id)->get();
		// var_dump($productdetails);
		// die();
		$categorys = Category::orderBy('name','asc')->get();	
		$collections = Collections::orderBy('name','asc')->get();
		$shops = Shops::orderBy('name','asc')->get();
		$brands = Brands::orderBy('name','asc')->get();
		$product = Products::find($id);
		return view('dashboard.products.edit')
		->with('product',$product)
		->with('categorys',$categorys)
		->with('collections',$collections)
		->with('shops',$shops)
		->with('brands',$brands)
		->with('productdetails',$productdetails);
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

		$product = Products::find($id);

		$this->validate($request,[
			'name' => 'required|max:255',
			'mname' => 'required|max:255',
			'productcode' => 'required|max:255',
			
			]);
		
		$imagePath = public_path() . '/images/products/';
		// $lastid = DB::table('mainslide')->select('id')->orderBy('id', 'DESC')->first();
		// echo $directory->id+1;
		// die();
		$directory = $id;

		$input = $request->all();
		$destinationPath = $imagePath . $directory . '/photos';
		
		// var_dump(Input::get('active'));

		$photourl1 = $product->photourl1;
		$photourl2 = $product->photourl2;
		$photourl3 = $product->photourl3;
		
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
				$photourl1 = "/images/products/" . $directory . '/photos/' .  $name;
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
				$photourl2 = "/images/products/" . $directory . '/photos/' .  $name;
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

				$photourl3 = "/images/products/" . $directory . '/photos/' .  $name;
			}
		}
		

		$product->name = $request->input("name");
		$product->mname = $request->input("mname");
		$product->productcode = $request->input("productcode");

		$product->categoryid = $request->input("category");
		$product->collectionid = $request->input("collection");

		$product->ourshopid = $request->input("shop");

		$product->active = 0;
		if (Input::get('active') === ""){$product->active = 1;}

		$product->new = 0;
		if (Input::get('new') === ""){$product->new = 1;}

		$product->specialselection = 0;
		if (Input::get('specialselection') === ""){$product->specialselection = 1;}

		$product->bestseller = 0;
		if (Input::get('bestseller') === ""){$product->bestseller = 1;}

		$product->lovely = 0;
		if (Input::get('lovely') === ""){$product->lovely = 1;}

		$product->brandid = $request->input("brand");		
		
		$product->omprice = $request->input("omprice");
		$product->mprice = $request->input("mprice");	

		$product->otprice = $request->input("otprice");	
		$product->tprice = $request->input("tprice");	

		$product->oiprice = $request->input("oiprice");	
		$product->iprice = $request->input("iprice");			
		
		$product->discount = $request->input("discount");
		$product->description = $request->input("description");
		$product->photourl1 = $photourl1;
		$product->photourl2 = $photourl2;
		$product->photourl3 = $photourl3;
		$product->save();
		return redirect()->route("products.index");
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
		$product = Products::find($id);

		$photourl1 = $product->photourl1;
		$photourl2 = $product->photourl2;
		$photourl3 = $product->photourl3;

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
		Products::destroy($id);

		return redirect()->route("products.index");
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
