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
        $superAdminRole =Role::create(['name' => 'super-admin']);
        $teacherRole = Role::create(['name' => 'teacher']);


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

            ['name' => 'create blogs'],
            ['name' => 'view blogs'],
            ['name' => 'edit blogs'],
            ['name' => 'delete blogs'],

            ['name' => 'create activities'],
            ['name' => 'view activities'],
            ['name' => 'edit activities'],
            ['name' => 'delete activities'],

            ['name' => 'create banners'],
            ['name' => 'view banners'],
            ['name' => 'edit banners'],
            ['name' => 'delete banners'],

            ['name' => 'view settings'],

            ['name' => 'view teachers'],

            ['name' => 'create classCategories'],
            ['name' => 'view classCategories'],
            ['name' => 'edit classCategories'],
            ['name' => 'delete classCategories'],

            ['name' => 'create classContents'],
            ['name' => 'view classContents'],
            ['name' => 'edit classContents'],
            ['name' => 'delete classContents'],



        ];


        foreach ($permission_data as $data) {
            Permission::create($data);
        }

        $superAdminRole->syncPermissions(Permission::all());
        
           // Define permissions specific to the teacher role
        $teacherPermissions = [
            'view classCategories',    
            'view classContents',
            'view blogs',
            'view notices',
            'view events'
        ];

        // Assign only specific permissions to the teacher role
        $teacherRole->syncPermissions($teacherPermissions);


        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('1234'),
        ])->assignRole('super-admin');
         // Create 5 teacher users with the teacher role
         User::factory()->count(5)->create()->each(function ($user) use ($teacherRole) {
            $user->assignRole($teacherRole);
        });

    }
}
