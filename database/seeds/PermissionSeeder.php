<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'role-list',
                'display_name' => 'Display Role Listing',
                'description' => 'See only Listing Of Role'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
            [
                'name' => 'client-list',
                'display_name' => 'Display Clients',
                'description' => 'See only Listing Of Clients'
            ],
            [
                'name' => 'client-create',
                'display_name' => 'Create Client',
                'description' => 'Create New Client'
            ],
            [
                'name' => 'client-edit',
                'display_name' => 'Edit Client',
                'description' => 'Edit Client'
            ],
            [
                'name' => 'client-delete',
                'display_name' => 'Delete Client',
                'description' => 'Delete Client'
            ]
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
