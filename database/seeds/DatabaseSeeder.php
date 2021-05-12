<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        app() [PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'View']);
        Permission::create(['name' => 'Create']);
        Permission::create(['name' => 'Edit']);
        Permission::create(['name' => 'Delete']);
        Permission::create(['name' => 'Publish']);
        Permission::create(['name' => 'Unpublish']);

        $role1 = Role::create(['name' => 'Super Admin']);
        $role2 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Writer']);

        $role1->givePermissionTo('View');
        $role1->givePermissionTo('Create');
        $role1->givePermissionTo('Edit');
        $role1->givePermissionTo('Delete');
        $role1->givePermissionTo('Publish');
        $role1->givePermissionTo('Unpublish');

        $role2->givePermissionTo('View');
        $role2->givePermissionTo('Create');
        $role2->givePermissionTo('Edit');
        $role2->givePermissionTo('Publish');
        $role2->givePermissionTo('Unpublish');

        $role3->givePermissionTo('View');
        $role3->givePermissionTo('Create');
        $role3->givePermissionTo('Edit');

        $user = Factory(User::class)->create([
            'name' => 'Super Admin',
            'user_name' => 'sadmin',
            'email' => 'admin@salaa.vn',
        ]);

        $user2 = Factory(User::class)->create([
            'name' => 'Admin',
            'user_name' => 'admin',
            'email' => 'user@salaa.vn'
        ]);

        $user->assignRole($role1);
        $user2->assignRole($role2);
    }
}
