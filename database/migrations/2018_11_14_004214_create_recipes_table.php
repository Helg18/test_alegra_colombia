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
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        // Pivot Table
        Schema::create('ingredient_recipe', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('recipe_id');
            $table->unsignedInteger('ingredient_id');
            $table->integer('quantity');
            $table->timestamps();


            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onUpdate('cascade')->onDelete('cascade');


            $table->index('ingredient_id', 'ingredients_recipes_id_foreign');
            $table->index('recipe_id', 'ingredients_recipe_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_recipe');
        Schema::dropIfExists('recipes');
    }
}
