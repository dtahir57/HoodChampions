<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Hood;

class HoodsNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hood::create(['planning_area_name' => 'Bishan', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Bukit Merah', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Bukit Timah', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Downtown Core', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Geylang', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Kallang', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Marina East', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Marina South', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Marine Parade', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Museum', 'region_id' => 1]);

        Hood::create(['planning_area_name' => 'Newton', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Novena', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Orchard', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Outram', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Queenstown', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'River Valley', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Rochor', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Singapore River', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Southern Islands', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Straits View', 'region_id' => 1]);

        Hood::create(['planning_area_name' => 'Tanglin', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Toa Payoh', 'region_id' => 1]);
        Hood::create(['planning_area_name' => 'Bedok', 'region_id' => 2]);
        Hood::create(['planning_area_name' => 'Changi', 'region_id' => 2]);
        Hood::create(['planning_area_name' => 'Changi Bay', 'region_id' => 2]);
        Hood::create(['planning_area_name' => 'Pasir Ris', 'region_id' => 2]);
        Hood::create(['planning_area_name' => 'Paya Lebar', 'region_id' => 2]);
        Hood::create(['planning_area_name' => 'Tampines', 'region_id' => 2]);
        Hood::create(['planning_area_name' => 'Central Water Catchment', 'region_id' => 3]);
        Hood::create(['planning_area_name' => 'Lim Chu Kang', 'region_id' => 3]);

        Hood::create(['planning_area_name' => 'Sembawang', 'region_id' => 3]);
        Hood::create(['planning_area_name' => 'Simpang', 'region_id' => 3]);
        Hood::create(['planning_area_name' => 'Sungei Kadut', 'region_id' => 3]);
        Hood::create(['planning_area_name' => 'Woodlands', 'region_id' => 3]);
        Hood::create(['planning_area_name' => 'Yishun', 'region_id' => 3]);
        Hood::create(['planning_area_name' => 'Ang Mo Kio', 'region_id' => 4]);
        Hood::create(['planning_area_name' => 'Hougang', 'region_id' => 4]);
        Hood::create(['planning_area_name' => 'North-Eastern Islands', 'region_id' => 4]);
        Hood::create(['planning_area_name' => 'Punggol', 'region_id' => 4]);
        Hood::create(['planning_area_name' => 'Seletar', 'region_id' => 4]);

        Hood::create(['planning_area_name' => 'Sengkang', 'region_id' => 4]);
        Hood::create(['planning_area_name' => 'Serangoon', 'region_id' => 4]);
        Hood::create(['planning_area_name' => 'Boon Lay', 'region_id' => 5]);
        Hood::create(['planning_area_name' => 'Bukit Batok', 'region_id' => 5]);
        Hood::create(['planning_area_name' => 'Bukit Panjang', 'region_id' => 5]);
        Hood::create(['planning_area_name' => 'Choa Chu Kang', 'region_id' => 5]);
        Hood::create(['planning_area_name' => 'Clementi', 'region_id' => 5]);
        Hood::create(['planning_area_name' => 'Jurong East', 'region_id' => 5]);
        Hood::create(['planning_area_name' => 'Jurong West', 'region_id' => 5]);
        Hood::create(['planning_area_name' => 'Pioneer', 'region_id' => 5]);

        Hood::create(['planning_area_name' => 'Tengah', 'region_id' => 5]);
        Hood::create(['planning_area_name' => 'Tuas', 'region_id' => 5]);
        Hood::create(['planning_area_name' => 'Western Islands', 'region_id' => 5]);
        Hood::create(['planning_area_name' => 'Western Water Catchment', 'region_id' => 5]);
    }
}
