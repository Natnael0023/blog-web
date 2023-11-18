<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Post $post)
    {
        // dd(request());
        $validated = request()->validate([
            'content' => 'required|max:50',
        ]);
    
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->user_id = Auth::id();
        $comment->content = $validated['content'];
        $comment->save();
    
        return redirect(route('home'))->with('success', 'Comment posted!');

    }


    public function destroy(Comment $comment)
    {
        $comment->destroy($comment->id);
        return redirect()->back()->with('success','comment deleted');
    }
}
