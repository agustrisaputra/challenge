<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cahced roles and permission
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $roles       = $this->getRoles();
        $permissions = $this->getPermission();

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($roles as $role) {
            $userRole = Role::create(['name' => $role]);

            if ($role == 'hrd') {
                $userRole->givePermissionTo('view');
                $userRole->givePermissionTo('read');
            }

            $this->assignRole($userRole, $role);
        }
    }

    private function getRoles() : array
    {
        $roles = [
            'senior-hrd',
            'hrd'
        ];

        return $roles;
    }

    private function getPermission() : array
    {
        $permissions = [
            'view',
            'read',
            'edit',
            'add',
            'delete',
        ];

        return $permissions;
    }

    private function assignRole($userRole, $role)
    {
        // create users
        $user = User::factory()->create([
            'name'     => $role == 'hrd' ? 'Lee' : 'Jhon',
            'email'    => $role == 'hrd' ? 'hrd@test.com' : 'senior-hrd@test.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole($userRole);
    }
}
