<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnonymousComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'anonymous_post_id',
        'user_id',
        'is_psychologist'
    ];

    public function post()
    {
        return $this->belongsTo(AnonymousPost::class, 'anonymous_post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
