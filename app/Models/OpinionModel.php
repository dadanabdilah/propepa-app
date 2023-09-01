<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpinionModel extends Model
{
    protected $table            = 'opinions';
    protected $fillable         = ['opinion', 'user_id'];

    public function User()
    {
        return $this->belongsTo(UserIdentity::class, 'user_id', 'user_id');
    }
}

class UserIdentity extends Model
{
    protected $table = "auth_identities";
}
