<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
    }
}
