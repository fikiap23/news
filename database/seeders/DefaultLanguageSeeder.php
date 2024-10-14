<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class DefaultLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            [
                'name' => 'Indonesia',
                'iso_code' => 'id',
                'is_default' => true,

            ],
        ];
        foreach ($languages as $language) {
            Language::create($language);
        }
    }
}
