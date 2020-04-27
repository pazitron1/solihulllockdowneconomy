<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description');
            $table->boolean('owner')->default(false);
            $table->text('product_info');
            $table->text('delivery_info');
            $table->unsignedInteger('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            $table->unsignedInteger('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->string('slug');
            $table->string('link')->nullable();
            $table->string('address_one');
            $table->string('address_two');
            $table->string('town');
            $table->string('postcode');
            $table->string('image_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesses');
    }
}
