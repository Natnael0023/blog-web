<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($post)
    {
        if(auth()->user()->likes()->where('post_id',$post)->exists())
        {
            return $this->unlike($post);
        }
        $liker = auth()->user();
        $liker->likes()->attach($post);
        return redirect()->back()->with('success');
    }

    public function unlike($post)
    {
        auth()->user()->likes()->detach($post);
        return redirect()->back()->with('success');
    }
}
