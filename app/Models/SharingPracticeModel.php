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

    public function UserIdentity()
    {
        return $this->belongsTo(UserIdentity::class, 'user_id', 'user_id');
    }
}

class UserIdentity extends Model
{
    protected $table = "auth_identities";
}
