<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory('App\Client', 50)->create()->each(function($u){
    		$u->telephones()->save(factory('App\Telephone')->make());
    	});
    }
}
