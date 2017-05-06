<?php namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\User;
use App\Mainslide;
use App\Maincategory;
use App\Bgphoto;
use App\Collections;
use App\Products;
use App\Productdetails;
use App\Posts;
use App\Blogs;

use View;
use Config;		

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

   
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		
	
		$this->middleware('auth');

		// $this->$variable1 = "light";

		
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
			
		Config::set('constants.headerstyle', 'normal');
		// View::share('headerstyle', Config::get('constants.headerstyle'));	

		$user = User::find($request->user()->id);
		 
		$mainslides = Mainslide::where('active',1)
		 			->orderBy('slideno','desc')
		 			->take(3)
		 			->get();
		$maincategorys = Maincategory::all(); 			
		
		$bgphoto = Bgphoto::find(1);

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

		$newcollections = Collections::take(4)->get();
		
		$posts = Posts::where('active',1)
					->orderBy('id','desc')
					->take(3)
					->get();

		$blogs = Blogs::orderBy('id','desc')
					->take(4)
					->get();

		 return view('pages.home')
		 		->with('user',$user)
		 		->with('mainslides',$mainslides)
		 		->with('maincategorys',$maincategorys)
		 		->with('bgphoto', $bgphoto)
		 		->with('newcollections', $newcollections)
		 		->with('bestsellerproducts', $bestsellerproducts)
		 		->with('specialselectionproducts', $specialselectionproducts)
		 		->with('posts',$posts)
		 		->with('blogs',$blogs);
		// return view('layouts.test');	
  	}
  	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	
  	
}
