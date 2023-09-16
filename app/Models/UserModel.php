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

    function getIdentity()
    {
        $this->select('auth_identities.*,auth_identities.id as identity_id, auth_groups_users.*, auth_groups_users.id as group_id,users.*, users.created_at AS first_work_date');

        $data = $this->join('auth_identities', 'users.id = auth_identities.user_id')
            ->join('auth_groups_users', 'users.id = auth_groups_users.user_id')
            ->findAll();

        return $data;
    }

    function getIdentityById($id = null)
    {
        $this->select('auth_identities.*,auth_identities.id as identity_id, auth_groups_users.*, auth_groups_users.id as group_id,users.*, users.created_at AS first_work_date');

        $data = $this->join('auth_identities', 'users.id = auth_identities.user_id')
            ->join('auth_groups_users', 'users.id = auth_groups_users.user_id')
            ->where('auth_identities.user_id', $id)
            ->first();

        return $data;
    }
}
