<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
            ->count(10)
            ->hasInvoices(5) // Each customer will have 5 invoices
            ->create();

        Customer::factory()
            ->count(100)
            ->hasInvoices(10) // Each customer will have 10 invoices
            ->create();

        Customer::factory()
            ->count(50)
            ->hasInvoices(3) // Each customer will have 3 invoices
            ->create();

        Customer::factory()
            ->count(5)
            ->create();
    }
}
