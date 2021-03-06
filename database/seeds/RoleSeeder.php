<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_user = Role::create(['name' => 'Super_User']);
        $super_user->givePermissionTo(['View_Permission', 'Add_Permission', 'Edit_Permission', 'Delete_Permission',
                                        'View_Role', 'Add_Role', 'Edit_Role', 'Delete_Role',
                                        'View_User', 'Add_User', 'Edit_User', 'Delete_User', 'Export_Users',
                                        'View_Hood', 'Add_Hood', 'Edit_Hood', 'Delete_Hood', 'Export_Hoods',
                                        'View_Region', 'Add_Region', 'Edit_Region', 'Delete_Region',
                                        'View_Service', 'Add_Service', 'Edit_Service', 'Delete_Service',
                                        'View_Team', 'Add_Team', 'Edit_Team', 'Delete_Team',
                                        'View_Categories', 'Add_Categories', 'Edit_Categories', 'Delete_Categories',
                                        'View_Interest_Groups', 'Add_Interest_Groups', 'Edit_Interest_Groups', 'Delete_Interest_Groups',
                                        'View_Activities', 'Add_Activities', 'Edit_Activities', 'Delete_Activities',
                                        'View_Lost_And_Found', 'Add_Lost_And_Found', 'Edit_Lost_And_Found', 'Delete_Lost_And_Found',
                                        'View_Battles', 'Add_Battles', 'Edit_Battles', 'Delete_Battles']);
        $captain = Role::create(['name' => 'Captain']);
    }
}
