<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create(['region' => 'Central']);
        Region::create(['region' => 'East']);
        Region::create(['region' => 'North']);
        Region::create(['region' => 'North-East']);
        Region::create(['region' => 'West']);
    }
}
