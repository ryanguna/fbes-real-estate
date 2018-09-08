<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            //Columns
            $table->increments('id');
            $table->string('name', 100)->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('price')->nullable();
            $table->string('contact_info')->nullable();
            $table->string('description')->nullable();
            $table->string('picture')->nullable();
            $table->unsignedInteger('property_type_id');
            $table->unsignedInteger('construction_type_id');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();



            //Foreign keys
            $table->foreign('property_type_id')
                ->references('id')->on('construction_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('construction_type_id')
                ->references('id')->on('property_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
