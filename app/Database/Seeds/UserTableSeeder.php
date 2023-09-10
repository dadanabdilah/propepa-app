<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

use App\Models\UserModel;

use CodeIgniter\Shield\Models\GroupModel;
use CodeIgniter\Shield\Models\UserIdentityModel;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $userModel = new UserModel;
        $groupModel = new GroupModel;
        $userIdentityModel = new UserIdentityModel;
        $now = Time::now('Asia/Jakarta', 'id_ID');

        $admin = [
            'username' => 'admin123',
            'active' => 1
        ];

        $userModel->insert($admin);
        $adminId = $userModel->getInsertID();

        $groups = [
            [
                'user_id' => $adminId,
                'group' => 'admin',
                'created_at' => $now
            ]
        ];

        $groupModel->insertBatch($groups);

        $userIdentities = [
            [
                'user_id' => $adminId,
                'type' => 'email_password',
                'name' => 'Admin',
                'secret' => 'admin@gmail.com',
                'secret2' => password_hash('123456789', PASSWORD_DEFAULT, $this->getHashOptions()),
                'created_at' => $now,
                'updated_at' => $now
            ]
        ];

        $userIdentityModel->insertBatch($userIdentities);
    }

    private function getHashOptions(): array
    {
        return [
            'cost' => 10,
        ];
    }
}
