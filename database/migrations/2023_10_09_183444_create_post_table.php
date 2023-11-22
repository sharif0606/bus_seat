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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title_en');
            $table->string('title_bn');
            $table->string('short_text_en');
            $table->string('short_text_bn');
            $table->text('text_en');
            $table->text('text_bn');
            $table->date('publish_date');
            $table->date('unpublish_date')->nullable();
            $table->boolean('featured');
            $table->boolean('front_right');
            $table->boolean('front_bottom');
            $table->integer('user_id');
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
        Schema::dropIfExists('first_pages');
    }
};
