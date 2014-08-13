<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('projects', function($table) {
                    $table->increments('id');
                    $table->string('name', 100);
                    $table->string('short_description_es', 100)->nullable();
                    $table->string('short_description_en', 100)->nullable();
                    $table->text('description_es')->nullable();
                    $table->text('description_en')->nullable();
                    $table->string('resources_es', 150)->nullable();
                    $table->string('resources_en', 150)->nullable();
                    $table->string('base_address', 50)->nullable();
                    $table->text('addresses')->nullable();
                    $table->text('contact')->nullable();
                    $table->string('email')->nullable();
                    $table->string('geo_coordinates', 40)->nullable();
                    $table->string('image_or_logo', 100)->nullable();
                    $table->boolean('selfmanaged')->nullable();
                    $table->boolean('vegan')->nullable();
                    $table->boolean('released')->nullable();
                    $table->timestamps();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('projects');
    }

}
