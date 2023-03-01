<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['movie_id', 'user_id', 'body'];

    public function user(){
        return $this->belongsTo(Comment::class);
}
}