<?php

use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $person = factory(App\Person::class, 3)->create();

        // Get all the roles attaching up to 3 random roles to each user
		$roles = App\Roles::all();

		// Populate the pivot table
		App\User::all()->each(function ($user) use ($roles) { 
		    $user->roles()->attach(
		        $roles->random(rand(1, 3))->pluck('id')->toArray()
		    ); 
		});

		/*
		factory(App\User::class, 2)->create()->each(function($u) {
    $u->issues()->save(factory(App\Issues::class)->make());
  });
		*/
    }
}
