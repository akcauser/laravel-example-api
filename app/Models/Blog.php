<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema()
 */
class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "blogs";

    protected $fillable = [
        'title',
        'body',
    ];

    public static $validationRules = [
        'title' => 'required|string|max:255',
        'body' => 'required|string',
    ];

    private $title;

    private $body;
}
