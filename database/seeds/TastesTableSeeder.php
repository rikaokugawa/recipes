<?php

use Illuminate\Database\Seeder;

class TastesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tastes')->insert([
        [
            'name' => 'お気に入り料理',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
         ],            

    ]);
    }
}
