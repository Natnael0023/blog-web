<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $followingsIds = $user->followings()->pluck('user_id');

        $posts = Post::
        whereIn('user_id',$followingsIds)
        ->orWhere('user_id',$user->id)
        ->latest()
        ->paginate(3);

        return view('feed.feed',compact('posts'));
    }
}
