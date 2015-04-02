<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EntrustTableSeeder extends Seeder {

	public function run()
	{
		$admin = Role::find(1);
		$teacher = Role::find(2);
		$stuff = Role::find(3);
		$student = Role::find(4);


		$read = Permission::find(1);


		$admin->attachPermission($read);


		$teacher->attachPermission($read);

		$stuff->attachPermission($read);

		$student->attachPermission($read);

		$user1 = User::find(1);
		$user2 = User::find(2);
		$user3 = User::find(3);
		$user4 = User::find(4);

		$user1->attachRole($admin);
		$user2->attachRole($teacher);
		$user3->attachRole($stuff);
		$user4->attachRole($student);


		for($i=5;$i<=50;$i++){
			$user_ids[] = $i;
		}


		$userfaker = User::whereIn('id',$user_ids)->get();

		foreach($userfaker as $userf){
			$userf->attachRole($student);

		}


	}

}