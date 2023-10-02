<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    protected $table       = 'articles';
    protected $fillable    = ['slug', 'thumbnail', 'title', 'content'];
}
