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

    public function tags()
    {
        return $this->hasMany(Tag::class, 'blog_id', 'id');
    }

    protected $with = [
        "tags",
    ];

    /**
     * Blog title
     * @var string
     *
     * @OA\Property(
     * property="title",
     * type="string",
     * description="Blog title"
     * )
     */
    private $title;

    /**
     * Blog body
     * @var string
     *
     * @OA\Property(
     * property="body",
     * type="string",
     * description="Blog body"
     * )
     */
    private $body;
}
