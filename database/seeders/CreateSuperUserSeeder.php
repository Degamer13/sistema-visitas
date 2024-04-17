<?php

        namespace Database\Seeders;

        use Illuminate\Database\Console\Seeds\WithoutModelEvents;
        use Illuminate\Database\Seeder;
        use App\Models\User;
        use Spatie\Permission\Models\Role;
        use Spatie\Permission\Models\Permission;

        class CreateSuperUserSeeder extends Seeder
        {
        /**
        * Run the database seeds.
        *
        * @return void
        */
        public function run()
        {
        $user = User::create([
        'name' => 'Super Usuario',
        'email' => 'superusuario@gmail.com',
        'password' => bcrypt('12345678')
        ]);

        $role = Role::create(['name' => 'Super Usuario']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
        }
        }
