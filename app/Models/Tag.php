<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "blog_id",
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }

    public static $validationRules = [
        'title' => 'required|string|max:255',
        'blog_id' => 'required|exists:blogs,id',
    ];
}
