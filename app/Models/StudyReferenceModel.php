<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyReferenceModel extends Model
{
    protected $table       = 'study_references';
    protected $fillable    = ['title', 'url_video', 'description', 'category_reference_id'];

    public function CategoryReference()
    {
        return $this->belongsTo(CategoryReferenceModel::class);
    }
}
