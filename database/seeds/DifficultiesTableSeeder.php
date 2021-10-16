<?php

use Illuminate\Database\Seeder;

class DifficultiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('difficulties')->insert([
        [
            'name' => '簡単料理',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
         ],            

    ]);
    }
}    
