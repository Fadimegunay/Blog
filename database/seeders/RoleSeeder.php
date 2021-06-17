<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Yönetici'
            ],
            [
                'name' => 'Moderatör'
            ],
            [
                'name' => 'Yazar'
            ],
            [
                'name' => 'Okuyucu'
            ]
        ];

        foreach ($roles as $role) {
            if (!Role::where('name', $role['name'])->exists()) {
                $newRole = new Role();
                $newRole->name = $role['name'];
                $newRole->save();
            
            }
        }
    }
}
