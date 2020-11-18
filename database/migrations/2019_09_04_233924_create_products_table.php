<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('archivo');
            $table->string('autor');
            $table->string('peso')->nullable();
            $table->string('size')->nullable();
            $table->longText('tecnica')->nullable();
            $table->string('laminado')->nullable();
            $table->string('material')->nullable();
            $table->longText('elaboracion')->nullable();
            $table->longText('precio')->nullable();
            $table->longText('attributes')->nullable();
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
        Schema::dropIfExists('products');
    }
}
