<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $role =Role::create(['name' => 'super-admin']);

        $permission_data = [
            ['name' => 'create users'],
            ['name' => 'view users'],
            ['name' => 'edit users'],
            ['name' => 'delete users'],

            ['name' => 'create roles'],
            ['name' => 'view roles'],
            ['name' => 'edit roles'],
            ['name' => 'delete roles'],

            ['name' => 'create permissions'],
            ['name' => 'view permissions'],
            ['name' => 'edit permissions'],
            ['name' => 'delete permissions'],

            ['name' => 'create dresses'],
            ['name' => 'view dresses'],
            ['name' => 'edit dresses'],
            ['name' => 'delete dresses'],

            ['name' => 'create video-galleries'],
            ['name' => 'view video-galleries'],
            ['name' => 'edit video-galleries'],
            ['name' => 'delete video-galleries'],

            ['name' => 'create photo-galleries'],
            ['name' => 'view photo-galleries'],
            ['name' => 'edit photo-galleries'],
            ['name' => 'delete photo-galleries'],

            ['name' => 'create notices'],
            ['name' => 'view notices'],
            ['name' => 'edit notices'],
            ['name' => 'delete notices'],

            ['name' => 'create events'],
            ['name' => 'view events'],
            ['name' => 'edit events'],
            ['name' => 'delete events'],

            ['name' => 'create abouts'],
            ['name' => 'view abouts'],
            ['name' => 'edit abouts'],
            ['name' => 'delete abouts'],

            ['name' => 'create why-us'],
            ['name' => 'view why-us'],
            ['name' => 'edit why-us'],
            ['name' => 'delete why-us'],

        ];


        foreach ($permission_data as $data) {
            $permission = Permission::create($data);
        }

        $role->syncPermissions(Permission::all());

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('1234'),
        ])->assignRole('super-admin');

    }
}
