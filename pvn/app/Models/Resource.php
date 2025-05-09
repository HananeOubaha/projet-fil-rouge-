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
        'file_path',
        'url',
        'user_id',
        'views',
        'downloads',
    ];

    // Supprimez ce cast car la colonne n'existe plus
    // protected $casts = [
    //     'categories' => 'array'
    // ];

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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'resource_category', 'resource_id', 'category_id');
    }
}