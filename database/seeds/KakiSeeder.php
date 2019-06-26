<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Http\Models\Service;
use App\Http\Models\Team;

class KakiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 81)->create()->each(function($user) {
        	$user->services()->save(factory(Service::class)->make());
        });
    }
}
