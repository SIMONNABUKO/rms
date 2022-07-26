<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_title');
            $table->text('property_summary');
            $table->string('property_image')->nullable();
            $table->text('property_description')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('restrict');
            $table->foreignId('location_id')->references('id')->on('locations')->onDelete('restrict');

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
        Schema::dropIfExists('properties');
    }
};
