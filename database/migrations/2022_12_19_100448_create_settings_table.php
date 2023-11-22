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
            $table->string('header_logo')->nullable();
            $table->string('home_page_image')->nullable();
            $table->text('address_en')->nullable();
            $table->text('address_bn')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('email_address')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->text('linkdin_link')->nullable();
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
