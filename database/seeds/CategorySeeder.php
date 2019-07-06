<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Category;
use App\Http\Models\InterestGroup;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interest_group_category = new Category;
        $interest_group_category->title = 'Art';
        $interest_group_category->image = Storage::putFile('public/categories/', asset('assets/graphics/Battles.svg'));
        $interest_group_category->categoryable_type = InterestGroup::class;
        $interest_group_category->save();

        $interest_group_category = new Category;
        $interest_group_category->title = 'Photography';
        $interest_group_category->image = Storage::putFile('public/categories/', asset('assets/graphics/Battles.svg'));
        $interest_group_category->categoryable_type = InterestGroup::class;
        $interest_group_category->save();

        $interest_group_category = new Category;
        $interest_group_category->title = 'Cooking';
        $interest_group_category->image = Storage::putFile('public/categories/', asset('assets/graphics/Battles.svg'));
        $interest_group_category->categoryable_type = InterestGroup::class;
        $interest_group_category->save();

        $interest_group_category = new Category;
        $interest_group_category->title = 'Music';
        $interest_group_category->image = Storage::putFile('public/categories/', asset('assets/graphics/Battles.svg'));
        $interest_group_category->categoryable_type = InterestGroup::class;
        $interest_group_category->save();

        $interest_group_category = new Category;
        $interest_group_category->title = 'Sports';
        $interest_group_category->image = Storage::putFile('public/categories/', asset('assets/graphics/Battles.svg'));
        $interest_group_category->categoryable_type = InterestGroup::class;
        $interest_group_category->save();

        $interest_group_category = new Category;
        $interest_group_category->title = 'Gardening';
        $interest_group_category->image = Storage::putFile('public/categories/', asset('assets/graphics/Battles.svg'));
        $interest_group_category->categoryable_type = InterestGroup::class;
        $interest_group_category->save();

        $interest_group_category = new Category;
        $interest_group_category->title = 'Mahjong';
        $interest_group_category->image = Storage::putFile('public/categories/', asset('assets/graphics/Battles.svg'));
        $interest_group_category->categoryable_type = InterestGroup::class;
        $interest_group_category->save();

        $interest_group_category = new Category;
        $interest_group_category->title = 'Others';
        $interest_group_category->image = Storage::putFile('public/categories/', asset('assets/graphics/Battles.svg'));
        $interest_group_category->categoryable_type = InterestGroup::class;
        $interest_group_category->save();
    }
}
