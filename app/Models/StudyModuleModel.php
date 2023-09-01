<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyModuleModel extends Model
{
    protected $table       = 'study_modules';
    protected $fillable    = ['title', 'url_module', 'description', 'category_module_id'];

    public function CategoryModule()
    {
        return $this->belongsTo(CategoryModuleModel::class);
    }
}
