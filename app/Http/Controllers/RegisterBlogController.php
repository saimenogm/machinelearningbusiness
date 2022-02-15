<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Blog as Blog;
use Illuminate\Support\Facades\DB;

//namespace App\Console\Commands;
use Illuminate\Console\Events;
use Illuminate\Foundation\Providers;
use Illuminate\Support\Facades;


class RegisterBlogController extends Controller
{
    //
	 public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }
	    public function new_post(Request $request)
    {
			return view('test.new_post');
    }
	
    public function store(Request $request)
    {
		
				$blog = new Blog();
		        $blog->title = $request->input ('title');
		        $blog->date_posted =$request->input ('date_posted');
		        $blog->date_updated =  $request->input ('date_updated');
		        $blog->posted_by = 1;
		        $blog->tags = $request->input ('tags');
		        $blog->category_name = $request->input ('category_name');
		        $blog->description = $request->input ('description');
			
                $blog->save ();
				
				
				 DB::table ('blog_contents')->insert (
                    ['blog_id' => $blog->id, 'content_order' => 1, 'content_details' => $request->input ('blog_content')]
                );
	}
	
	    public function post_details($post_id)
    {

	$data['post_details'] =  DB::table ('blogs')
	->where('id', $post_id) 
            ->first ();
			
      $data['post_contents'] = DB::table ('blog_contents')
	  ->where('blog_id', $post_id) 
            ->get ();

       $data['posts'] = DB::table ('blogs')
            ->get ();

			return view('test.post_detail',$data);
    }
	

	    public function about(Request $request)
    {
		Artisan::call('cache:clear');
			return view('test.about');
    }
	
	    public function deep_learning(Request $request)
    {
			return view('test.construction');
    }

	    public function computer_vision(Request $request)
    {
			return view('test.construction');
    }

	    public function machine_learning(Request $request)
    {
			return view('test.construction');
    }

	    public function data_science(Request $request)
    {
			return view('test.construction');
    }
	
		    public function data_visualization(Request $request)
    {
			return view('test.construction');
    }
	
}
