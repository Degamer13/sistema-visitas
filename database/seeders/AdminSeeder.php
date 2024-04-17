<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'visita-list',
            'visita-create',
            'visita-edit',
            'visita-delete',
        ];

        foreach ($permissions as $permissionName) {
            $permission = Permission::where('name', $permissionName)->first();
            $role->givePermissionTo($permission);
        }

        $user->assignRole($role);
    }
}
