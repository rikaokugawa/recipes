<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(NutrientsTableSeeder::class);
         //$this->call(MaterialcategoriesTableSeeder::class);
         $this->call(MaterialsTableSeeder::class);
         //$this->call(NutrientMaterialsTableSeeder::class);
         //$this->call(RecipeCategoriesTableSeeder::class);
         //$this->call(DifficultiesTableSeeder::class);
         //$this->call(MaterialrecipesTableSeeder::class);
         //$this->call(TastesTableSeeder::class);
         //$this->call(FeelingsTableSeeder::class);
         //$this->call(DatesTableSeeder::class);
         //$this->call(HowtosTableSeeder::class);
         
    }
}
