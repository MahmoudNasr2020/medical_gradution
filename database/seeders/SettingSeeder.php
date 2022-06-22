<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
     function run()
    {
        Setting::truncate();
        Setting::create([
            'site_name'=>'طبيات',
            'commission'=>10,
            'logo' => asset('images/logo.png')
        ]);
    }
}
