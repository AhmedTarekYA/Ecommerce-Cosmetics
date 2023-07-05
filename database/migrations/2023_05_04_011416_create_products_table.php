<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('title',255)->nullable();
            $table->text('desc')->nullable();
            $table->decimal('price_before')->nullable();
            $table->decimal('price_after')->nullable();
            $table->integer('reviews_num')->default(0);
            $table->enum('stars',[1,2,3,4,5])->default(5);
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
};
