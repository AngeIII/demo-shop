<?php

use App\Order;
use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Order::all()->count()) {
            $this->command->warn('Table not empty. Seeding skipped.');

            return;
        }

        factory(Order::class, 15)->create();
    }
}
