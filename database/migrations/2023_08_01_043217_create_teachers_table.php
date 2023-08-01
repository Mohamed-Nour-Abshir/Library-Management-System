<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 512);
            $table->string('last_name', 512);
            $table->tinyInteger('approved')->default(0);
            $table->tinyInteger('rejected')->default(0);
            $table->integer('category')->unsigned();
            $table->string('id_num', 15);
            $table->tinyInteger('branch')->default(0);
            $table->integer('year')->unsigned();
            $table->tinyInteger('books_issued')->default(0);
            $table->string('email_id', 512);
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
