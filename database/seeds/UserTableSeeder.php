<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$data = array(
			[
				'name' 		=> 'Juan Manuel', 
				'last_name' => 'Gonzalez', 
				'email' 	=> 'juanmagon1988@hotmail.com', 
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'admin',
				'address' 	=> '15 N 565, La Plata, Buenos Aires',
				'phone' 	=> '2216258545',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			[
				'name' 		=> 'Adela', 
				'last_name' => 'Flores', 
				'email' 	=> 'adela@gmail.com', 
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'user',
				'address' 	=> 'Tonala 321, Jalisco',
				'phone' 	=> '22155874456',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			[
				'name' 		=> 'Diego', 
				'last_name' => 'Tedezco', 
				'email' 	=> 'diego@gmail.com', 
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'admin',
				'address' 	=> 'Tonala 321, Jalisco',
				'phone' 	=> '22155874456',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			[
				'name' 		=> 'Mariano', 
				'last_name' => 'Ramirez', 
				'email' 	=> 'pocho@gmail.com', 
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'admin',
				'address' 	=> 'Tonala 321, Jalisco',
				'phone' 	=> '22155874456',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],
			[
				'name' 		=> 'Manuel', 
				'last_name' => 'De Luca', 
				'email' 	=> 'manu@gmail.com', 
				'password' 	=> \Hash::make('123456'),
				'type' 		=> 'admin',
				'address' 	=> 'Tonala 321, Jalisco',
				'phone' 	=> '22155874456',
				'created_at'=> new DateTime,
				'updated_at'=> new DateTime
			],

		);

		User::insert($data);

	}
}
