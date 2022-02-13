<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog as Blog;
use Illuminate\Support\Facades\DB;

class testing extends Controller
{
    //
    public function index_tasks()
    {
	       $data['posts'] = DB::table ('blogs')
            ->get ();

			
        return view('test.posts',$data);
    }
}
