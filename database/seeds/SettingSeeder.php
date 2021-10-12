<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name' => "Laravel's Blog",
            'address' => 'Russia, Petersburg',
            'contact_phone' => '8 900 7562 4844',
            'contact_email' => 'info@Laravel_blog.com'
        ]);
        
    }
}
