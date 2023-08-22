<?php

namespace App\Models;

use CodeIgniter\Shield\Models\UserModel as UserMod;

class UserModel extends UserMod
{
    protected $useSoftDeletes = false;

    protected $allowedFields  = [
        'username',
        'status',
        'status_message',
        'active',
        'last_active',
        'deleted_at',
        'permissions'
    ];
}
