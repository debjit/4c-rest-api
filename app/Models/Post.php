<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      title="Post",
 *     description="Post model",
 *     @OA\Xml(
 *         name="Post"
 *     ),
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="title",
 *          description="title",
 *          type="string",
 *          format="string"
 *      ),
 *      @OA\Property(
 *          property="body",
 *          description="body",
 *          type="string",
 *          format="string"
 *      )
 * );
 */
class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body'];
}
