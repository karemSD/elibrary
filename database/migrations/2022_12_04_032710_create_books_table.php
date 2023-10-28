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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title',25);
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('publisher_id')->constrained('publishers')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('author_id')->constrained('authors')->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('status')->default('Y');
            $table->bigInteger('price');
            $table->string('pathImage');
            $table->text('description');
            $table->text('publish_year');
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
        Schema::dropIfExists('books');
    }
};
