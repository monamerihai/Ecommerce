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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoryid');
            $table->unsignedBigInteger('subcategoryid'); // Use unsignedBigInteger for foreign keys
            $table->string('productname');
            $table->string('img')->nullable();
            $table->string('price')->nullable();
            $table->string('tittle')->nullable();
            $table->timestamps();
            // Define the foreign key constraint on subcategories table
          
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
};