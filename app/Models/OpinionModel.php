<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpinionModel extends Model
{
    protected $table            = 'opinions';
    protected $fillable         = ['opinion', 'user_id'];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

class User extends Model
{
    protected $table = "users";
}
