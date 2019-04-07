<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Rene R.',
            'email' => 'admin@developments.world',
            'password' => Hash::make('12345678'),
            'role' => 'ADMIN',
        ]);
    }
}
