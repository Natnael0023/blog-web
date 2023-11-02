<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::id())
        {
            $usertype = Auth()->user()->usertype;

            if($usertype == 'admin')
            {
                return view('admin.admin-dashboard');
            }

            else if($usertype == 'user')
            {

        
                $posts = Post::orderBy('created_at','desc')->get();

                return view('feed.feed', ['posts' => $posts]);

               
             }        
            }
            else 
            {
                return redirect()->back();
            }
        }



    public function search(Request $request)
    {

        
        $keyword = $request->input('keyword');

        $posts = Post::where('title','like',"%$keyword%")->orWhere('text','like',"%$keyword%")->get();

        return view('feed.feed',['posts'=>$posts,'searchResults'=>$posts]);
        
    }

    public function homepage()
    {
        return view('home.homepage');
    }

}
