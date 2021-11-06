<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usuarios
        Permission::create(["name" => "View users"]);
        Permission::create(["name" => "Create users"]);
        Permission::create(["name" => "Edit users"]);
        Permission::create(["name" => "Delete users"]);

        // Roles list
        $admin = Role::create(["name" => "Admin"]);
        $employee = Role::create(["name" => "Employee"]);

        $admin->givePermissionTo([
            "View users",
            "Create users",
            "Edit users",
            "Delete users",
        ]);
    }
}
