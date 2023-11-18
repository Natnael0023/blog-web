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
                $posts = Post::orderBy('created_at','desc');

                if(request()->has('keyword'))
                {
                    $keyword = $request->input('keyword');    
                    $posts->where('title','like',"%$keyword%")->orWhere('text','like',"%$keyword%");
                }

                $posts = $posts->paginate(3);

                $menulinks = [
                    (object) ['id'=>1, 'name'=>'Home', 'route'=>'home', 'icon'=>'home.ico'],
                    (object) ['id'=>2, 'name'=>'Terms','route'=>'terms','icon'=>'terms.ico'],
                    (object) ['id'=>3, 'name'=>'Feeds','route'=>'feeds','icon'=>'home.ico'],
                    (object) ['id'=>4, 'name'=>'Profile','route'=>'profile','icon'=>'home.ico'],

                ];

                return view('feed.feed', ['posts' => $posts,'searchResults'=>$posts,'menulinks'=>$menulinks]);
             }    

            }
            else 
            {
                return redirect()->back();
            }
        }


    public function homepage()
    {
        return view('home.homepage');
    }

}
