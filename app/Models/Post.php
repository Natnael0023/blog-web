<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $table = 'posts';

    protected $fillable = [
        'title',
        'text',
        'image',
    ];

    protected $with = ['user:id,name,avatar', 'comments.user:id,name,avatar'];

    protected $withCount = ['likes'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class,'post_like')->withTimestamps();
    }
};