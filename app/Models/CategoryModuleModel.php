<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModuleModel extends Model
{
    protected $table       = 'category_modules';
    protected $fillable    = ['name', 'photo'];
}
