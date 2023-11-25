<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use App\Notifications\CommentCreatedNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CommentSection extends Component
{
    use WithPagination;

    public $post;
    public $visibleCom = 1;
    public $newComment;
    public $commenter;
    public $loading = false;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->commenter = auth()->user();
    }

    public function loadMoreComments()
    {
        $this->visibleCom += 1;
    }

    public function collapse()
    {
        $this->visibleCom -= 1;
    }

    public function addComment()
    {
        $this->loading = true;

        $validated = $this->validate([
            'newComment' => 'required|max:255'
        ]);

        $comment = new Comment();
        $comment->post_id = $this->post->id;
        $comment->user_id = $this->commenter->id;
        $comment->content = $validated['newComment'];
        $comment->save();

        $this->loading = false;

        $postOwner = $comment->post->user;
        // $notf = new CommentCreatedNotification($comment);
        // $postOwner->notify($notf);

        $notifData = [
            'message' => $comment->user->name. 'commented on your post',
            'link' => route('feed'),
        ];

        DB::table('notifications')->insert([
            'data' => json_encode($notifData),
            'user_id' => $postOwner->id,
        ]);


    }

    public function render()
    {
        $comments = $this->post->comments()->with('user')->latest()->limit($this->visibleCom)->get();
        return view('livewire.comment-section',compact('comments'));
    }
}
