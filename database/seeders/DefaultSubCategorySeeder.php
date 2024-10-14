<?php

namespace Database\Seeders;

use App\Models\Navigation;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class DefaultSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subCategories = [
            [
                'name' => 'World Wide Sports',
                'show_in_menu' => 1,
                'parent_category_id' => 1,
                'lang_id' => 1,
                'slug' => 'world-wide-sports',
            ],
            [
                'name' => 'Mobile Gaming',
                'show_in_menu' => 1,
                'parent_category_id' => 2,
                'lang_id' => 1,
                'slug' => 'mobile-gaming',
            ],
            [
                'name' => 'Great Technology',
                'show_in_menu' => 1,
                'parent_category_id' => 3,
                'lang_id' => 1,
                'slug' => 'great-technology',
            ],

        ];
        foreach ($subCategories as $subCategory) {
            $subCategoryId = SubCategory::create($subCategory);

            $navigationOrder = Navigation::whereNavigationableType(SubCategory::class)
                ->whereParentId($subCategory['parent_category_id'])->count() + 1;

            Navigation::create([
                'navigationable_type' => SubCategory::class,
                'navigationable_id' => $subCategoryId['id'],
                'order_id' => $navigationOrder,
                'parent_id' => $subCategory['parent_category_id'],
            ]);
        }
    }
}
