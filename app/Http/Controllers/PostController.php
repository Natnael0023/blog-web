<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create(){
        return view('post.create-post');
    }

    public function store(Request $request){
        // dd($request);

        $newPost = new Post;

        $newPost->title = $request->input('title');

        if($request->input('text')){
             $newPost->text = $request->input('text');
        }

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$request->image->extension();
            $image->move(public_path('images'),$imageName);
            $newPost->image = $imageName;
            // dd($request);
        }

        $newPost->user()->associate(auth()->user());

        $newPost->save();
        
        return redirect(route('home'));
    }

    public function edit(Post $post) {
        if($post->user_id !== auth()->user()->id){
            return redirect()->back()->with('unauthorized','You\'re not authorized');
        }
        else{
            return view('post.edit-post',['post'=>$post]);
        }
    }

    public function update(Post $post, Request $request){
        if($request->hasFile('image')){
            $newImage = $request->file('image');

            if($newImage){
                $imageName = time().'.'.$request->image->extension();
                $newImage->move(public_path('images'),$imageName);
           
                $oldImagePath = 'images/'.$post->image;
                unlink($oldImagePath);

                $post->image = $imageName;
            }
            else {
                $post->image = null;
            }
        }

    if($request->input('title')){
        $post->title = $request->input('title');
    }

    if($request->input('text')){
        $post->text = $request->input('text');
    }

    // dd($request);
    $post->save();
    return redirect(route('home'))->with('status','post updated successfully');
    }

    public function delete(Post $post, Request $request){
  
        if($post->user_id == auth()->user()->id)
        {
             if($post->image){
                 $path = 'images/'.$post->image;
                 unlink($path);
             }

             $post->delete($request->all());
        }
        else 
        {
            return redirect()->back()->with('error','You\'re not authorized');
        }
        return redirect()->back()->with('success','Post has been deleted');
    }
}
