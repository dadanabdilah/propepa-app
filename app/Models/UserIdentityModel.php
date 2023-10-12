<?php

namespace App\Models;

use CodeIgniter\Shield\Models\UserIdentityModel as UserIdentityMod;

class UserIdentityModel extends UserIdentityMod
{
    protected $allowedFields  = [
        'user_id',
        'type',
        'institution',
        'whatsapp_number',
        'address',
        'secret',
        'secret2',
        'expires',
        'extra',
        'force_reset',
        'last_used_at',
    ];
}
