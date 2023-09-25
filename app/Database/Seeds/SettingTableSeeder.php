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
        setting('App.siteAddress', 'Jl. Terusan Jendral Sudirman, Cimahi 40526, Provinsi Jawa Barat, 40521');
        setting('App.siteMail', 'mail@propepa.id');
        setting('App.sitePhone', '08122400');
        setting('App.siteMaps', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1973.6604224447428!2d107.52622722337051!3d-6.8876163334227805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e453712109bd%3A0x6cc9ae8eb42ce187!2sIKIP%20Siliwangi!5e0!3m2!1sid!2sid!4v1695638322747!5m2!1sid!2sid');
        setting('App.siteURL', 'https://propepa.id');
        setting('App.siteVideoURL', 'https://www.youtube.com/embed/QBuz0VTdJ-U?si=yLAU9Pgu-jxEHNoS');
        setting('App.siteWhatsappGroupURL', 'https://whatsapp.com');
        setting('App.siteTelegramGroupURL', 'https://telegram.com');
    }
}
