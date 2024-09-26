<?php

namespace Database\Seeders;

use App\Models\SeoTool;
use Illuminate\Database\Seeder;

class DefaultSeoToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seoTools =
            [
                'lang_id' => '1',
                'site_title' => 'PTSP',
                'home_title' => 'Home',
                'site_description' => 'PTSP Kab. Sumedang',
                'keyword' => 'PTSP Kab. Sumedang',
                'google_analytics' => '',
            ];
        SeoTool::create($seoTools);
    }
}
