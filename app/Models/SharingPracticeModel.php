<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SharingPracticeModel extends Model
{
    protected $table = "sharing_practices";
    protected $fillable = ['title', 'url', 'type', 'description', 'status', 'category_reference_id', 'category_module_id', 'user_id'];

    public function CategoryModule()
    {
        return $this->belongsTo(CategoryModuleModel::class);
    }

    public function CategoryReference()
    {
        return $this->belongsTo(CategoryReferenceModel::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

class User extends Model
{
    protected $table = "users";
}
