<?php

namespace Database\Seeders;

use App\Http\Controllers\Auth\AuthController;
use App\Models\Role;
use App\Models\User;
use App\Models\Secteur;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Faker\Provider\fr_FR\Person;
use Faker\Provider\fr_FR\Address;
use Faker\Provider\fr_FR\Company;
use Illuminate\Support\Facades\Hash;
use Faker\Provider\fr_FR\PhoneNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $faker->locale = 'fr_FR';

        // Admins
        $admin_users = [
            [
                "firstname" => "John",
                "lastname" => "Doe",
                "email" => "admin@plania.com",
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
        ];

        // Collaborators
        $collaborator_users = [
            [
                "firstname" => "Jane",
                "lastname" => "Doe",
                "email" => "janedoe@plania.com",
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
        ];


        $this->createUserWithRoles($admin_users, [Role::ADMIN_ROLE_ALIAS]);
        $this->createUserWithRoles($collaborator_users, [Role::COLLABORATOR_ROLE_ALIAS]);
    }

    public function createUserWithRoles(array $users, array $roles)
    {

        foreach ($users as $user) {
            $user = User::create($user);
            $user->roles()->attach(Role::whereIn('alias', $roles)->get()->pluck('id')->toArray());
        }
    }
}
