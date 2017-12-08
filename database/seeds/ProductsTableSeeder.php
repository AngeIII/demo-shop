<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Product::all()->count()) {
            $this->command->warn('Table not empty. Seeding skipped.');

            return;
        }

        factory(Product::class, 20)->create();
        Product::create(
            [
                'name' => 'Coca Cola',
                'count' => 10,
                'price' => 1.0,
            ]
        );
        Product::create(
            [
                'name' => 'Pepsi Cola',
                'count' => 10,
                'price' => 1.0,
            ]
        );
    }
}
