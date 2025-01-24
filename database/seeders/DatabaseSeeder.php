<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles if they don't exist
        $roles = ['Admin', 'Manager', 'Employee', 'Client'];
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName]);
        }

        // Define permissions
        $permissions = [
            'create lead', 'edit lead', 'delete lead', 'view lead',
            'create proposal', 'edit proposal', 'delete proposal', 'view proposal',
            'create estimate', 'edit estimate', 'delete estimate', 'view estimate',
            'create invoice', 'edit invoice', 'delete invoice', 'view invoice'
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $adminRole = Role::findByName('Admin');
        $adminRole->syncPermissions(Permission::all());

        $managerRole = Role::findByName('Manager');
        $managerRole->syncPermissions([
            'create lead', 'edit lead', 'view lead',
            'create proposal', 'edit proposal', 'view proposal',
            'create estimate', 'edit estimate', 'view estimate',
            'view invoice'
        ]);

        $employeeRole = Role::findByName('Employee');
        $employeeRole->syncPermissions([
            'create lead', 'view lead',
            'create proposal', 'view proposal',
            'create estimate', 'view estimate',
            'create invoice', 'view invoice'
        ]);

        $clientRole = Role::findByName('Client');
        $clientRole->syncPermissions([
            'view proposal', 'view estimate', 'view invoice'
        ]);

        // Create users with roles
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => 'Admin@123',
                'role' => 'Admin'
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@example.com',
                'password' => 'Manager@123',
                'role' => 'Manager'
            ],
            [
                'name' => 'Employee User',
                'email' => 'employee@example.com',
                'password' => 'Employee@123',
                'role' => 'Employee'
            ],
            [
                'name' => 'Client User',
                'email' => 'client@example.com',
                'password' => 'Client@123',
                'role' => 'Client'
            ]
        ];

        foreach ($users as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => bcrypt($userData['password']),
                    'email_verified_at' => now()
                ]
            );

            // Assign role if not already assigned
            if (!$user->hasRole($userData['role'])) {
                $user->assignRole($userData['role']);
            }
        }
    }
}