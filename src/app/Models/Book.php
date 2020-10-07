<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'author',
        'title',
        'content_raw',
        'content_html',
    ];
}
