<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('name');
            $table->text('body');
            $table->bigInteger('recipe_category_id')->nullable();
            $table->bigInteger('date_id');
            $table->bigInteger('difficulty_id')->nullable();
            $table->bigInteger('howto_id')->nullable();
            $table->bigInteger('feeling_id')->nullable();
            $table->bigInteger('taste_id')->nullable();
            $table->string('image_path1')->nullable();
            $table->string('image_path2')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
