<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Category;
use App\Http\Models\InterestGroup;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 10)->create()->each(function ($category) {
        	$category->categoryable()->save(factory(InterestGroup::class)->make());
        });
    }
}
