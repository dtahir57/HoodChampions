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
        Hood::create(['planning_area_name' => 'Bishan', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Bukit Merah', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Bukit Timah', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Downtown Core', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Geylang', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Kallang', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Marina East', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Marina South', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Marine Parade', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Museum', 'region' => 'Central']);

        Hood::create(['planning_area_name' => 'Newton', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Novena', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Orchard', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Outram', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Queenstown', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'River Valley', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Rochor', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Singapore River', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Southern Islands', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Straits View', 'region' => 'Central']);

        Hood::create(['planning_area_name' => 'Tanglin', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Toa Payoh', 'region' => 'Central']);
        Hood::create(['planning_area_name' => 'Bedok', 'region' => 'East']);
        Hood::create(['planning_area_name' => 'Changi', 'region' => 'East']);
        Hood::create(['planning_area_name' => 'Changi Bay', 'region' => 'East']);
        Hood::create(['planning_area_name' => 'Pasir Ris', 'region' => 'East']);
        Hood::create(['planning_area_name' => 'Paya Lebar', 'region' => 'East']);
        Hood::create(['planning_area_name' => 'Tampines', 'region' => 'East']);
        Hood::create(['planning_area_name' => 'Central Water Catchment', 'region' => 'North']);
        Hood::create(['planning_area_name' => 'Lim Chu Kang', 'region' => 'North']);

        Hood::create(['planning_area_name' => 'Sembawang', 'region' => 'North']);
        Hood::create(['planning_area_name' => 'Simpang', 'region' => 'North']);
        Hood::create(['planning_area_name' => 'Sungei Kadut', 'region' => 'North']);
        Hood::create(['planning_area_name' => 'Woodlands', 'region' => 'North']);
        Hood::create(['planning_area_name' => 'Yishun', 'region' => 'North']);
        Hood::create(['planning_area_name' => 'Ang Mo Kio', 'region' => 'North-East']);
        Hood::create(['planning_area_name' => 'Hougang', 'region' => 'North-East']);
        Hood::create(['planning_area_name' => 'North-Eastern Islands', 'region' => 'North-East']);
        Hood::create(['planning_area_name' => 'Punggol', 'region' => 'North-East']);
        Hood::create(['planning_area_name' => 'Seletar', 'region' => 'North-East']);

        Hood::create(['planning_area_name' => 'Sengkang', 'region' => 'North-East']);
        Hood::create(['planning_area_name' => 'Serangoon', 'region' => 'North-East']);
        Hood::create(['planning_area_name' => 'Boon Lay', 'region' => 'West']);
        Hood::create(['planning_area_name' => 'Bukit Batok', 'region' => 'West']);
        Hood::create(['planning_area_name' => 'Bukit Panjang', 'region' => 'West']);
        Hood::create(['planning_area_name' => 'Choa Chu Kang', 'region' => 'West']);
        Hood::create(['planning_area_name' => 'Clementi', 'region' => 'West']);
        Hood::create(['planning_area_name' => 'Jurong East', 'region' => 'West']);
        Hood::create(['planning_area_name' => 'Jurong West', 'region' => 'West']);
        Hood::create(['planning_area_name' => 'Pioneer', 'region' => 'West']);

        Hood::create(['planning_area_name' => 'Tengah', 'region' => 'West']);
        Hood::create(['planning_area_name' => 'Tuas', 'region' => 'West']);
        Hood::create(['planning_area_name' => 'Western Islands', 'region' => 'West']);
        Hood::create(['planning_area_name' => 'Western Water Catchment', 'region' => 'West']);
    }
}
