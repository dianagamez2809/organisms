<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		//$this->call('UserSeeder');
		DB::table('users')->delete();
	    Usuario::create(array(
	        'name' => 'anette',
	        'password' => Hash::make('System1.pass'),
	    ));
	}

}
