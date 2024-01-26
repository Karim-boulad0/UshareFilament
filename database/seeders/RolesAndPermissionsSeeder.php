<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Misc
        $miscPermission = Permission::create(['name' => 'N/A']);

        // USER MODEL
        $userPermission0 = Permission::create(['name' => 'view_user']);
        $userPermission1 = Permission::create(['name' => 'create_user']);
        $userPermission2 = Permission::create(['name' => 'read_user']);
        $userPermission3 = Permission::create(['name' => 'update_user']);
        $userPermission4 = Permission::create(['name' => 'delete_user']);
        $userPermission5 = Permission::create(['name' => 'delete_any_user']);
        $userPermission6 = Permission::create(['name' => 'force_delete_user']);
        $userPermission7 = Permission::create(['name' => 'force_delete_any_user']);
        $userPermission8 = Permission::create(['name' => 'restore_user']);
        $userPermission9 = Permission::create(['name' => 'restore_any_user']);
        $userPermission10 = Permission::create(['name' => 'replicate_user']);
        $userPermission11 = Permission::create(['name' => 'reorder_user']);
        $userPermission12 = Permission::create(['name' => 'view_any_user']);
        // bundle 
        $bundlePermission0 = Permission::create(['name' => 'view_bundle']);
        $bundlePermission1 = Permission::create(['name' => 'create_bundle']);
        $bundlePermission2 = Permission::create(['name' => 'read_bundle']);
        $bundlePermission3 = Permission::create(['name' => 'update_bundle']);
        $bundlePermission4 = Permission::create(['name' => 'delete_bundle']);
        $bundlePermission5 = Permission::create(['name' => 'delete_any_bundle']);
        $bundlePermission6 = Permission::create(['name' => 'force_delete_bundle']);
        $bundlePermission7 = Permission::create(['name' => 'force_delete_any_bundle']);
        $bundlePermission8 = Permission::create(['name' => 'restore_bundle']);
        $bundlePermission9 = Permission::create(['name' => 'restore_any_bundle']);
        $bundlePermission10 = Permission::create(['name' => 'replicate_bundle']);
        $bundlePermission11 = Permission::create(['name' => 'reorder_bundle']);
        $bundlePermission12 = Permission::create(['name' => 'view_any_bundle']);
        // cycle MODEL
        $cyclePermission0 = Permission::create(['name' => 'view_cycle']);
        $cyclePermission1 = Permission::create(['name' => 'create_cycle']);
        $cyclePermission2 = Permission::create(['name' => 'read_cycle']);
        $cyclePermission3 = Permission::create(['name' => 'update_cycle']);
        $cyclePermission4 = Permission::create(['name' => 'delete_cycle']);
        $cyclePermission5 = Permission::create(['name' => 'delete_any_cycle']);
        $cyclePermission6 = Permission::create(['name' => 'force_delete_cycle']);
        $cyclePermission7 = Permission::create(['name' => 'force_delete_any_cycle']);
        $cyclePermission8 = Permission::create(['name' => 'restore_cycle']);
        $cyclePermission9 = Permission::create(['name' => 'restore_any_cycle']);
        $cyclePermission10 = Permission::create(['name' => 'replicate_cycle']);
        $cyclePermission11 = Permission::create(['name' => 'reorder_cycle']);
        $cyclePermission12 = Permission::create(['name' => 'view_any_cycle']);
        // cyclebundle MODEL
        $cyclebundlePermission0 = Permission::create(['name' => 'view_cycleBundle']);
        $cyclebundlePermission1 = Permission::create(['name' => 'create_cycleBundle']);
        $cyclebundlePermission2 = Permission::create(['name' => 'read_cycleBundle']);
        $cyclebundlePermission3 = Permission::create(['name' => 'update_cycleBundle']);
        $cyclebundlePermission4 = Permission::create(['name' => 'delete_cycleBundle']);
        $cyclebundlePermission5 = Permission::create(['name' => 'delete_any_cycleBundle']);
        $cyclebundlePermission6 = Permission::create(['name' => 'force_delete_cycleBundle']);
        $cyclebundlePermission7 = Permission::create(['name' => 'force_delete_any_cycleBundle']);
        $cyclebundlePermission8 = Permission::create(['name' => 'restore_cycleBundle']);
        $cyclebundlePermission9 = Permission::create(['name' => 'restore_any_cycleBundle']);
        $cyclebundlePermission10 = Permission::create(['name' => 'replicate_cycleBundle']);
        $cyclebundlePermission11 = Permission::create(['name' => 'reorder_cycleBundle']);
        $cyclebundlePermission12 = Permission::create(['name' => 'view_any_cycleBundle']);

        // subscription MODEL
        $subscriptionPermission0 = Permission::create(['name' => 'view_subscription']);
        $subscriptionPermission1 = Permission::create(['name' => 'create_subscription']);
        $subscriptionPermission2 = Permission::create(['name' => 'read_subscription']);
        $subscriptionPermission3 = Permission::create(['name' => 'update_subscription']);
        $subscriptionPermission4 = Permission::create(['name' => 'delete_subscription']);
        $subscriptionPermission5 = Permission::create(['name' => 'delete_any_subscription']);
        $subscriptionPermission6 = Permission::create(['name' => 'force_delete_subscription']);
        $subscriptionPermission7 = Permission::create(['name' => 'force_delete_any_subscription']);
        $subscriptionPermission8 = Permission::create(['name' => 'restore_subscription']);
        $subscriptionPermission9 = Permission::create(['name' => 'restore_any_subscription']);
        $subscriptionPermission10 = Permission::create(['name' => 'replicate_subscription']);
        $subscriptionPermission11 = Permission::create(['name' => 'reorder_subscription']);
        $subscriptionPermission12 = Permission::create(['name' => 'view_any_subscription']);

        // ROLE MODEL
        $rolePermission0 = Permission::create(['name' => 'view_role']);
        $rolePermission1 = Permission::create(['name' => 'create_role']);
        $rolePermission2 = Permission::create(['name' => 'read_role']);
        $rolePermission3 = Permission::create(['name' => 'update_role']);
        $rolePermission4 = Permission::create(['name' => 'delete_role']);
        $rolePermission4 = Permission::create(['name' => 'view_any_role']);

        // PERMISSION MODEL
        $permission0 = Permission::create(['name' => 'view_permission']);
        $permission1 = Permission::create(['name' => 'create_permission']);
        $permission2 = Permission::create(['name' => 'read_permission']);
        $permission3 = Permission::create(['name' => 'update_permission']);
        $permission4 = Permission::create(['name' => 'delete_permission']);

        // ADMINS
        $adminPermission1 = Permission::create(['name' => 'read_admin']);
        $adminPermission2 = Permission::create(['name' => 'update_admin']);

        // CREATE ROLES
        $userRole = Role::create(['name' => 'user'])->syncPermissions([
            $miscPermission,
        ]);
        $showArchiveRole = Role::create(['name' => 'show-archive']);
        $superAdminRole = Role::create(['name' => 'super-admin'])->syncPermissions([
            // user permessions
            $userPermission0,
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,
            $userPermission5,
            $userPermission6,
            $userPermission7,
            $userPermission8,
            $userPermission9,
            $userPermission10,
            $userPermission11,
            $userPermission12,
            //   bundle permessions 
            $bundlePermission0,
            $bundlePermission1,
            $bundlePermission2,
            $bundlePermission3,
            $bundlePermission4,
            $bundlePermission5,
            $bundlePermission6,
            $bundlePermission7,
            $bundlePermission8,
            $bundlePermission9,
            $bundlePermission10,
            $bundlePermission11,
            $bundlePermission12,
            //   cyclebundle permessions 
            $cyclebundlePermission0,
            $cyclebundlePermission1,
            $cyclebundlePermission2,
            $cyclebundlePermission3,
            $cyclebundlePermission4,
            $cyclebundlePermission5,
            $cyclebundlePermission6,
            $cyclebundlePermission7,
            $cyclebundlePermission8,
            $cyclebundlePermission9,
            $cyclebundlePermission10,
            $cyclebundlePermission11,
            $cyclebundlePermission12,
            //   cycle permessions 
            $cyclePermission0,
            $cyclePermission1,
            $cyclePermission2,
            $cyclePermission3,
            $cyclePermission4,
            $cyclePermission5,
            $cyclePermission6,
            $cyclePermission7,
            $cyclePermission8,
            $cyclePermission9,
            $cyclePermission10,
            $cyclePermission11,
            $cyclePermission12,
            //   subscription permessions 
            $subscriptionPermission0,
            $subscriptionPermission1,
            $subscriptionPermission2,
            $subscriptionPermission3,
            $subscriptionPermission4,
            $subscriptionPermission5,
            $subscriptionPermission6,
            $subscriptionPermission7,
            $subscriptionPermission8,
            $subscriptionPermission9,
            $subscriptionPermission10,
            $subscriptionPermission11,
            $subscriptionPermission12,

            $rolePermission0,
            $rolePermission1,
            $rolePermission2,
            $rolePermission3,
            $rolePermission4,
            $permission0,
            $permission1,
            $permission2,
            $permission3,
            $permission4,
            $adminPermission1,
            $adminPermission2,
            $userPermission1,
        ]);
        $adminRole = Role::create(['name' => 'admin'])->syncPermissions([
            $userPermission0,
            $userPermission1,
            $userPermission2,
            $userPermission3,
            $userPermission4,

            $permission0,
            $permission1,
            $permission2,
            $permission3,
            $permission4,
            $adminPermission1,
            $adminPermission2,
            $userPermission1,
        ]);


        // CREATE ADMINS & USERS
        User::create([
            'name' => 'super admin',
            'email' => 'super@gmail.com',
            'is_admin' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('super123$%'),
            'remember_token' => Str::random(10),
            'admin_create' => 0
        ])->assignRole($superAdminRole);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123$%'),
            'remember_token' => Str::random(10),
            'is_admin' => 1,
            'admin_create' => 1

        ])->assignRole($adminRole);



        // for ($i=1; $i < 50; $i++) {
        //     User::create([
        //         'name' => 'Test '.$i,
        //         'email' => 'test'.$i.'@test.com',
        //         'email_verified_at' => now(),
        //         'password' => Hash::make('password'), // password
        //         'remember_token' => Str::random(10),
        //     ])->assignRole($userRole);
        // }
    }
}
