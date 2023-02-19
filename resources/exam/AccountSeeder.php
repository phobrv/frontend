<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Str;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $data = [
            'name' => 'SuperUser',
            'email' => 'superuser@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$ynqBiNVeQ1spa/.DtckXReVlLPE/tvOm5SMpgCwCNn9xaRvfhI7nO',
            'remember_token' => Str::random(10),
        ];
        $user = User::create($data);

        $data = [
            'name' => 'SuperAdmin',
            'guard_name' => 'web',
        ];
        $role = Role::insert($data);
        $user->assignRole('SuperAdmin');
    }
}
