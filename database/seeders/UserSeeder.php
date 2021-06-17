<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $email = 'admin@mobillium.com';
        if (!User::where('email', $email)->exists()) {
            $role = Role::where('name', 'Yönetici')->first();
            $newUser = new User();
            $newUser->name = 'Mobillium';
            $newUser->email = $email;
            $newUser->password = md5('mobillium');
            $newUser->is_active = true;
            $newUser->role_id = $role->id;
            $newUser->save();
        }

        $email = 'writer1@mobillium.com';
        if (!User::where('email', $email)->exists()) {
            $role = Role::where('name', 'Yazar')->first();
            $newUser = new User();
            $newUser->name = 'Mobillium';
            $newUser->email = $email;
            $newUser->password = md5('mobillium');
            $newUser->is_active = true;
            $newUser->role_id = $role->id;
            $newUser->save();
        }
    }
}
