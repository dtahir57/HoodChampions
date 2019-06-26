<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::create(['name' => 'View_Permission']);
        Permission::create(['name' => 'Add_Permission']);
        Permission::create(['name' => 'Edit_Permission']);
        Permission::create(['name' => 'Delete_Permission']);

        Permission::create(['name' => 'View_Role']);
        Permission::create(['name' => 'Add_Role']);
        Permission::create(['name' => 'Edit_Role']);
        Permission::create(['name' => 'Delete_Role']);

        Permission::create(['name' => 'View_User']);
        Permission::create(['name' => 'Add_User']);
        Permission::create(['name' => 'Edit_User']);
        Permission::create(['name' => 'Delete_User']);

        Permission::create(['name' => 'View_Hood']);
        Permission::create(['name' => 'Add_Hood']);
        Permission::create(['name' => 'Edit_Hood']);
        Permission::create(['name' => 'Delete_Hood']);

        Permission::create(['name' => 'View_Service']);
        Permission::create(['name' => 'Add_Service']);
        Permission::create(['name' => 'Edit_Service']);
        Permission::create(['name' => 'Delete_Service']);

        Permission::create(['name' => 'View_Team']);
        Permission::create(['name' => 'Add_Team']);
        Permission::create(['name' => 'Edit_Team']);
        Permission::create(['name' => 'Delete_Team']);

        Permission::create(['name' => 'View_Group_Categories']);
        Permission::create(['name' => 'Add_Group_Categories']);
        Permission::create(['name' => 'Edit_Group_Categories']);
        Permission::create(['name' => 'Delete_Group_Categories']);

        Permission::create(['name' => 'View_Interest_Groups']);
        Permission::create(['name' => 'Add_Interest_Groups']);
        Permission::create(['name' => 'Edit_Interest_Groups']);
        Permission::create(['name' => 'Delete_Interest_Groups']);
    }
}
