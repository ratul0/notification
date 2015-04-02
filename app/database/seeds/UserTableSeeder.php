<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$users = [
					[
								'first_name'       => 'admin',
								'last_name'       => 'admin',
								'email'      => 'admin@test.com',
								'password'   => Hash::make('a'),
								'created_at' => date('Y-m-d H:i:s'),
								'updated_at' => date('Y-m-d H:i:s')
					]

		];

		DB::table('users')->insert($users);


	}

}