<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $role = Role::create(['name' => 'Usuario']);

        $permissions = [
         
            'visita-list',
            'visita-create',
            
        ];

        foreach ($permissions as $permissionName) {
            $permission = Permission::where('name', $permissionName)->first();
            $role->givePermissionTo($permission);
        }
        
        $user->assignRole($role);
    }
}