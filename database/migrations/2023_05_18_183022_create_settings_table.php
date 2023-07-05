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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable();
            $table->string('logo',255)->nullable();
            $table->string('phone',255)->nullable();
            $table->string('whatsapp',255)->nullable();
            $table->string('gmail',255)->nullable();
            $table->string('facebook',255)->nullable();
            $table->enum('order_type',['whatsapp','site'])->default('whatsapp');
            $table->text('about')->nullable();
            $table->text('about_image')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
