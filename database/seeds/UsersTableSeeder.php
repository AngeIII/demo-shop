<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::all()->count()) {
            $this->command->warn('Table not empty. Seeding skipped.');

            return;
        }

        factory(User::class, 1000)->create();
    }
}
