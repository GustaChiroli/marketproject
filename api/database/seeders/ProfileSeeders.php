<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;

class ProfileSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [
            [
                'name' => 'admin', 'read' => 1, 'update' => 1, 'delete' => 1, 'create' => 1
            ],
            [
                'name' => 'user', 'read' => 1, 'update' => 1, 'delete' => 0, 'create' => 1
            ],
            [
                'name' => 'seller', 'read' => 1, 'update' => 1, 'delete' => 0, 'create' => 1
            ],
            [
                'name' => 'employee', 'read' => 1, 'update' => 1, 'delete' => 0, 'create' => 1
            ],
            [
                'name' => 'client', 'read' => 1, 'update' => 1, 'delete' => 0, 'create' => 1
            ],
        ];

        foreach($profiles as $profil) {
            Profile::create($profil);
        }
    }
}
