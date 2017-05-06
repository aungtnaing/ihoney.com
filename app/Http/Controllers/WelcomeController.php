<?php namespace App\Http\Controllers;


use App\Mainslide;
use App\Maincategory;
use App\Bgphoto;
use App\Collections;
use App\Products;
use App\Posts;
use App\Blogs;
use View;
use Config;

class WelcomeController extends Controller {

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
		
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{

		Config::set('constants.headerstyle', 'normal');
		// View::share('headerstyle', Config::get('constants.headerstyle'));

		$mainslides = Mainslide::where('active',1)
		 			->orderBy('slideno','desc')
		 			->take(3)
		 			->get();
		$maincategorys = Maincategory::all(); 			
		
		$bgphoto = Bgphoto::find(1);

		$newcollections = Collections::take(4)->get();


		$bestsellerproducts = Products::where('active',1)
					->where('bestseller', 1)
		 			->orderBy('id','desc')
		 			->take(8)
		 			->get();

		$specialselectionproducts = Products::where('active',1)
					->where('specialselection', 1)
		 			->orderBy('id','desc')
		 			->take(8)
		 			->get();

		 $posts = Posts::where('active',1)
					->orderBy('id','desc')
					->take(3)
					->get();

			$blogs = Blogs::orderBy('id','desc')
					->take(4)
					->get();

		 return view('pages.home')
		 		->with('mainslides',$mainslides)
		 		->with('maincategorys',$maincategorys)
		 		->with('bgphoto', $bgphoto)
		 		->with('newcollections', $newcollections)
		 		->with('bestsellerproducts', $bestsellerproducts)
		 		->with('specialselectionproducts', $specialselectionproducts)
		 		->with('posts',$posts)
		 		->with('blogs',$blogs);
	}

	

}


