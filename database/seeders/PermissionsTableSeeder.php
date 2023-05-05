<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'equipe_create',
            ],
            [
                'id'    => 18,
                'title' => 'equipe_edit',
            ],
            [
                'id'    => 19,
                'title' => 'equipe_show',
            ],
            [
                'id'    => 20,
                'title' => 'equipe_delete',
            ],
            [
                'id'    => 21,
                'title' => 'equipe_access',
            ],
            [
                'id'    => 22,
                'title' => 'joueur_create',
            ],
            [
                'id'    => 23,
                'title' => 'joueur_edit',
            ],
            [
                'id'    => 24,
                'title' => 'joueur_show',
            ],
            [
                'id'    => 25,
                'title' => 'joueur_delete',
            ],
            [
                'id'    => 26,
                'title' => 'joueur_access',
            ],
            [
                'id'    => 27,
                'title' => 'match_create',
            ],
            [
                'id'    => 28,
                'title' => 'match_edit',
            ],
            [
                'id'    => 29,
                'title' => 'match_show',
            ],
            [
                'id'    => 30,
                'title' => 'match_delete',
            ],
            [
                'id'    => 31,
                'title' => 'match_access',
            ],
            [
                'id'    => 32,
                'title' => 'stade_create',
            ],
            [
                'id'    => 33,
                'title' => 'stade_edit',
            ],
            [
                'id'    => 34,
                'title' => 'stade_show',
            ],
            [
                'id'    => 35,
                'title' => 'stade_delete',
            ],
            [
                'id'    => 36,
                'title' => 'stade_access',
            ],
            [
                'id'    => 37,
                'title' => 'tournoi_create',
            ],
            [
                'id'    => 38,
                'title' => 'tournoi_edit',
            ],
            [
                'id'    => 39,
                'title' => 'tournoi_show',
            ],
            [
                'id'    => 40,
                'title' => 'tournoi_delete',
            ],
            [
                'id'    => 41,
                'title' => 'tournoi_access',
            ],
            [
                'id'    => 42,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
