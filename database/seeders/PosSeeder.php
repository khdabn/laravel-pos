<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class PosSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            [
                'full_name' => 'Ana Santos',
                'email' => 'ana@example.com',
                'phone' => '09171234501',
            ],
            [
                'full_name' => 'Carlo Reyes',
                'email' => 'carlo@example.com',
                'phone' => '09171234502',
            ],
            [
                'full_name' => 'Maria Cruz',
                'email' => 'maria@example.com',
                'phone' => '09171234503',
            ],
            [
                'full_name' => 'Luis Garcia',
                'email' => 'luis@example.com',
                'phone' => '09171234504',
            ],
            [
                'full_name' => 'Sofia Ramos',
                'email' => 'sofia@example.com',
                'phone' => '09171234505',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::updateOrCreate(
                ['email' => $customer['email']],
                $customer
            );
        }

        $users = [
            ['username' => 'ana_admin', 'full_name' => 'Ana Santos'],
            ['username' => 'carlo_cashier', 'full_name' => 'Carlo Reyes'],
            ['username' => 'maria_staff', 'full_name' => 'Maria Cruz'],
            ['username' => 'luis_manager', 'full_name' => 'Luis Garcia'],
            ['username' => 'sofia_staff', 'full_name' => 'Sofia Ramos'],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['username' => $user['username']],
                $user
            );
        }
    }
}