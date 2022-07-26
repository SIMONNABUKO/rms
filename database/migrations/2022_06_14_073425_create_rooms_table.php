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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->references('id')->on('properties')->onDelete('restrict');
            $table->unsignedInteger('bathrooms')->nullable();
            $table->unsignedInteger('toilets')->nullable();
            $table->unsignedInteger('bedrooms')->nullable();
            $table->unsignedInteger('kitchens')->nullable();
            $table->string('rooms_image')->nullable();
            $table->tinyInteger('is_occupied')->default(0)->comment('1->occupied, 0->empty');
            $table->tinyInteger('status')->default(0)->comment('1->approved, 0->pending');
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
        Schema::dropIfExists('rooms');
    }
};
