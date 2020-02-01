<?php

use App\Contato;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 1; $i <= 10; $i ++) {
            Contato::create([
                'nome' => $faker->name,
                'telefone' => $faker->phoneNumber
            ]);
        }
    }
}
