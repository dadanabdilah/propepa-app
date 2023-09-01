<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryReferenceModel extends Model
{
    protected $table       = 'category_references';
    protected $fillable    = ['name', 'photo'];
}
