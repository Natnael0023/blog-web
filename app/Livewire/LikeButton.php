<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class LikeButton extends Component
{
    public $post;
    public $liker;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->liker = auth()->user();
    }

    public function like()
    {
        if($this->liker->likes()->where('post_id',$this->post->id)->exists())
        {
            return $this->unlike();
        }
        else{
        $this->liker->likes()->attach($this->post);
        }
        $this->post->refresh();
    }

    public function unlike()
    {
        $this->liker->likes()->detach($this->post);
        $this->post->refresh();
    }

    
    public function render()
    {
        return view('livewire.like-button');
    }
}
