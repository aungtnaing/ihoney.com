<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Products;
use App\Posts;
use App\Blogs;
use View;
use Config;
use App\Wishlist;

use App\Category;
use App\Maincategory;
use App\Brands;
use App\Collections;
use App\Shops;
use App\Productdetails;
use App\User;
use App\Bgphoto;



class PagesController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		
		// $this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function contact()
	{
		$maincategorys = Maincategory::all(); 	
			
		return view('pages.contact')->with('maincategorys', $maincategorys);
		
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function blogitems()
	{
		$lastproduct = Products::where('active',1)->orderBy('id', 'desc')->first();

			$bestsellerproducts = Products::where('active',1)
			->where('bestseller', 1)
			->orderBy('id','desc')
			->take(3)
			->get();

			$blogs = Blogs::orderBy('id', 'desc')->paginate(5);
			



			$maincategorys = Maincategory::all(); 	
			
			return view('pages.blogitems')
			->with('lastproduct', $lastproduct)
			->with('bestsellerproducts', $bestsellerproducts)
			->with('maincategorys', $maincategorys)
			->with('blogs', $blogs);
	
	}
/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function postitems()
	{
		$lastproduct = Products::where('active',1)->orderBy('id', 'desc')->first();

			$bestsellerproducts = Products::where('active',1)
			->where('bestseller', 1)
			->orderBy('id','desc')
			->take(3)
			->get();

			$posts = Posts::orderBy('id', 'desc')->paginate(5);

			$maincategorys = Maincategory::all(); 	
			
			return view('pages.postitems')
			->with('lastproduct', $lastproduct)
			->with('bestsellerproducts', $bestsellerproducts)
			->with('maincategorys', $maincategorys)
			->with('posts', $posts);
	
	}
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function wishlist(Request $request)
	{
		

			$maincategorys = Maincategory::all(); 
			$wishlists = Wishlist::where('userid', $request->user()->id)->groupBy('productid')->get();	
			

			return view('pages.wishlist')
			->with('maincategorys', $maincategorys)
			->with('wishlists', $wishlists);
	
	}


		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
		public function productlists(Request $request, $type , $typeid)
		{

			// View::share('headerstyle', Config::get('constants.headerstyle'));


			switch ($type) {
				case "category":
						
						$productlists = Products::where('active',1)
										->where('categoryid', $typeid)
										->orderBy('id', 'desc')
										->paginate(4);

						$title = Category::find($typeid)->name;
				break;

				case "maincategory":
						
						$categorys = Maincategory::find($typeid)->categorys;

						$node = array(); 
						foreach($categorys as $cat)
						{
							$node[] = array($cat->id);
						}

						$productlists = Products::where('active',1)
						->whereIn('categoryid', $node)
						->orderBy('id', 'desc')
						->paginate(4);


						$title = Maincategory::find($typeid)->name;
				break;

				case "newarrivel":
				
						$productlists = Products::where('active',1)
										->where('new', $typeid)
										->orderBy('id', 'desc')
										->paginate(4);

						$title = "new arrivel";
				
				break;

				case "lovely":
				
						$productlists = Products::where('active',1)
										->where('lovely', $typeid)
										->orderBy('id', 'desc')
										->paginate(4);

						$title = "new arrivel";
				
				break;

				case "collection":
				
						$productlists = Products::where('active',1)
										->where('collectionid', $typeid)
										->orderBy('id', 'desc')
										->paginate(4);

						$title = Collections::find($typeid)->name;
				
				break;

				case "bestseller":
				
						$productlists = Products::where('active',1)
										->where('bestseller', $typeid)
										->orderBy('id', 'desc')
										->paginate(4);

						$title = "bestseller";
				
				break;

				case "specialselection":
				
						$productlists = Products::where('active',1)
										->where('specialselection', $typeid)
										->orderBy('id', 'desc')
										->paginate(4);

						$title = "special selection";
				
				break;

				default:
				echo "Your favorite color is neither red, blue, nor green!";
			}
		

			
			$maincategorys = Maincategory::all(); 

			$bgphoto = Bgphoto::find(1);

			$lastproduct = Products::where('active',1)->orderBy('id', 'desc')->first();

			$bestsellerproducts = Products::where('active',1)
			->where('bestseller', 1)
			->orderBy('id','desc')
			->take(3)
			->get();

			return view("pages.productlists")
			->with('bgphoto', $bgphoto)
			->with('productlists', $productlists)
			->with('maincategorys',$maincategorys)
			->with('type', $type)
			->with('typeid', $typeid)
			->with('lastproduct', $lastproduct)
			->with('bestsellerproducts', $bestsellerproducts)
			->with('title', $title);


		}

		/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
		public function productgrids(Request $request,  $type , $typeid)
		{
				
				// View::share('headerstyle', Config::get('constants.headerstyle'));
				switch ($type) {
				case "category":
						
						$productlists = Products::where('active',1)
										->where('categoryid', $typeid)
										->orderBy('id', 'desc')
										->paginate(6);

						$title = Category::find($typeid)->name;
				break;

				case "maincategory":
						
						$categorys = Maincategory::find($typeid)->categorys;

						$node = array(); 
						foreach($categorys as $cat)
						{
							$node[] = array($cat->id);
						}

						$productlists = Products::where('active',1)
						->whereIn('categoryid', $node)
						->orderBy('id', 'desc')
						->paginate(6);


						$title = Maincategory::find($typeid)->name;
				break;

				case "newarrivel":
				
						$productlists = Products::where('active',1)
										->where('new', $typeid)
										->orderBy('id', 'desc')
										->paginate(6);

						$title = "new arrivel";
				
				break;

				case "lovely":
				
						$productlists = Products::where('active',1)
										->where('lovely', $typeid)
										->orderBy('id', 'desc')
										->paginate(6);

						$title = "new arrivel";
				
				break;

				case "collection":
				
						$productlists = Products::where('active',1)
										->where('collectionid', $typeid)
										->orderBy('id', 'desc')
										->paginate(6);

						$title = Collections::find($typeid)->name;
				
				break;

				case "bestseller":
				
						$productlists = Products::where('active',1)
										->where('bestseller', $typeid)
										->orderBy('id', 'desc')
										->paginate(4);

						$title = $type;
				
				break;

				case "specialselection":
				
						$productlists = Products::where('active',1)
										->where('specialselection', $typeid)
										->orderBy('id', 'desc')
										->paginate(4);

						$title = $type;
				
				break;

				default:
				echo "Your favorite color is neither red, blue, nor green!";
			}
		

			
			$maincategorys = Maincategory::all(); 

			$bgphoto = Bgphoto::find(1);

			$lastproduct = Products::where('active',1)->orderBy('id', 'desc')->first();

			$bestsellerproducts = Products::where('active',1)
			->where('bestseller', 1)
			->orderBy('id','desc')
			->take(3)
			->get();

			return view("pages.productgrids")
			->with('bgphoto', $bgphoto)
			->with('productlists', $productlists)
			->with('maincategorys',$maincategorys)
			->with('type', $type)
			->with('typeid', $typeid)
			->with('lastproduct', $lastproduct)
			->with('bestsellerproducts', $bestsellerproducts)
			->with('title', $title);

		}



}


