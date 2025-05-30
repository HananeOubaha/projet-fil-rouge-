<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];

    public function resources()
    {
        return $this->belongsToMany(Resource::class, 'resource_category', 'category_id', 'resource_id');
    }
}