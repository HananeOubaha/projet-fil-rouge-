<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnonymousPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
        'anonymous_id',
        'notify_email',
        'support_count'
    ];

    protected $attributes = [
        'support_count' => 0,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(AnonymousComment::class);
    }
}
