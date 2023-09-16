<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    public function run()
    {
        helper('setting');

        setting('App.siteName', 'PROPEPA');
        setting('App.siteLogo', 'logo.png');
        setting('App.siteIntroText', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius quod quisquam animi nemo! Quasi impedit deleniti ex accusamus modi hic, quia quos nisi, vitae voluptatum velit dicta sit soluta. Atque.');
        setting('App.siteAbout', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius quod quisquam animi nemo! Quasi impedit deleniti ex accusamus modi hic, quia quos nisi, vitae voluptatum velit dicta sit soluta. Atque.');
        setting('App.siteVideoURL', 'https://youtube.com');
        setting('App.siteWhatsappGroupURL', 'https://whatsapp.com');
        setting('App.siteTelegramGroupURL', 'https://telegram.com');
    }
}
