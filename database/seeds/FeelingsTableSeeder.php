<?php

use Illuminate\Database\Seeder;

class FeelingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('feelings')->insert([
        [
            'name' => 'あっさり料理',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
         ],            

    ]);     
    }
}
