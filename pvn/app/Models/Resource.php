<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'description',
        'categories',
        'file_path',
        'url',
        'user_id',
        'views',
        'downloads',
    ];

    protected $casts = [
        'categories' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function psychologue(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'resource_id'); 
    }
public function comments()
{
    return $this->hasMany(Comment::class)->latest();
}

public function isLikedBy(User $user)
{
    return $this->likes()->where('user_id', $user->id)->exists();
}
} 