<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use DB;

use File;
use Input;

use App\Blogs;



class BlogsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		 $blogs = Blogs::orderBy('id', 'desc')->paginate(5);
		return view("dashboard.blogs.blogspannel")->with('blogs', $blogs);
		

	}

	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		// $Blogs = Blogs::orderBy('id', 'desc')->paginate(5);
		return view("dashboard.blogs.create");
		

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


		$blog = new Blogs();
		$imagePath = public_path() . '/images/blogs';
		$lastid = DB::table('blogs')->select('id')->orderBy('id', 'DESC')->first();
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
				$photourl1 = "/images/blogs/photos/" .  $name;
			
			
			}

		}

		$blog->name = $request->input("name");
		$blog->content = $request->input("content");
		$blog->photourl1 = $photourl1;
		$blog->active = 0;
		if (Input::get('active') === '1'){$blog->active = 1;}
		$blog->userid = $request->user()->id;
		$blog->save();
		return redirect()->route("blogs.index");
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
		$blog = blogs::find($id);
		return view('dashboard.blogs.edit')
				->with('blog',$blog);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,Request $request)
	{
	
		
		$blog = Blogs::find($id);
		
		
			$this->validate($request,[
			'name' => 'required|max:255',
			'content' => 'required|max:2000',
			
			
			]);


	
		$imagePath = public_path() . '/images/blogs';
		
		
		$input = $request->all();
		$destinationPath = $imagePath . '/photos';
		
	

		$photourl1 = $blog->photourl1;
		
	

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
				$photourl1 = "/images/blogs/photos/" .  $name;
			
			}

		}
	
		

		
		$blog->name = $request->input("name");
		$blog->content = $request->input("content");
		$blog->photourl1 = $photourl1;
		$blog->active = 0;
		if (Input::get('active') === ""){$blog->active = 1;}
		$blog->save();
		return redirect()->route("blogs.index");
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
		$blog = Blogs::find($id);

		
		$photourl1 = $blog->photourl1;
		

			if($photourl1!="")
				{
					if(file_exists(public_path() .$photourl1))
					{
						unlink(public_path() . $photourl1);
					}
				}


		Blogs::destroy($id);

		return redirect()->route("blogs.index");
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
