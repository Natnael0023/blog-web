<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::id())
        {
                $posts = Post::
                latest();

                if(request()->has('keyword'))
                {
                    $keyword = $request->input('keyword');    
                    $posts->where('title','like',"%$keyword%")->orWhere('text','like',"%$keyword%");
                }

                $posts = $posts->paginate(3);

              
                return view('feed.feed', ['posts' => $posts,'searchResults'=>$posts]);
            }
           
        }


    public function homepage()
    {
        return view('home.homepage');
    }

}
