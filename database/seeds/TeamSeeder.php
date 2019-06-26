<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Team;
use App\User;
use Spatie\Permission\Models\Role;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Team::class, 8)->create();
    }
}
