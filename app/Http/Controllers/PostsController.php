<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use DB;

use File;
use Input;

use App\Posts;



class PostsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		 $posts = Posts::orderBy('id', 'desc')->paginate(5);
		return view("dashboard.posts.postspannel")->with('posts', $posts);
		

	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		// $posts = Posts::orderBy('id', 'desc')->paginate(5);
		return view("dashboard.posts.create");
		

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
			'name' => 'required|max:255',
			'content' => 'required|max:2000',
			
			
			]);


		$post = new Posts();
		$imagePath = public_path() . '/images/posts';
		$lastid = DB::table('posts')->select('id')->orderBy('id', 'DESC')->first();
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
				$photourl1 = "/images/posts/photos/" .  $name;
			
			
			}

		}

		$post->name = $request->input("name");
		$post->content = $request->input("content");
		$post->photourl1 = $photourl1;
		$post->active = 0;
		$post->userid = $request->user()->id;
		if (Input::get('active') === '1'){$post->active = 1;}
		$post->save();
		return redirect()->route("posts.index");
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

		$post = Posts::find($id);
		return view('dashboard.posts.edit')
				->with('post',$post);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
	
		
		$post = Posts::find($id);
		
		
			$this->validate($request,[
		
			'name' => 'required|max:255',
			'content' => 'required|max:2000',
			
			
			]);


	
		$imagePath = public_path() . '/images/posts';
		
		
		$input = $request->all();
		$destinationPath = $imagePath . '/photos';
		
	

		$photourl1 = $post->photourl1;
		
	

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
				$photourl1 = "/images/posts/photos/" .  $name;
			
			}

		}
	
		

		
		$post->name = $request->input("name");
		$post->content = $request->input("content");
		$post->photourl1 = $photourl1;
		$post->active = 0;
		if (Input::get('active') === ""){$post->active = 1;}
		$post->save();
		return redirect()->route("posts.index");
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
		$post = Posts::find($id);

		
		$photourl1 = $post->photourl1;
		

			if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}


		Posts::destroy($id);

		return redirect()->route("posts.index");
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
