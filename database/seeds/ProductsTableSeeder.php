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

        factory(Product::class, 10)->create();
        Product::create(
            [
                'name' => 'Coca Cola',
                'price' => 1.8,
            ]
        );
        Product::create(
            [
                'name' => 'Pepsi Cola',
                'price' => 1.6,
            ]
        );
        Product::create(
            [
                'name' => 'Fanta',
                'price' => 0.8,
            ]
        );
        Product::create(
            [
                'name' => 'Beer',
                'price' => 1.2,
            ]
        );
    }
}
