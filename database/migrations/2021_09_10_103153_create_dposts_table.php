<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dposts', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('etitle');
            $table->string('stitle');
            $table->mediumText('ehighlight');
            $table->mediumText('shighlight');
            $table->longText('edescription');
            $table->longText('sdescription');
            $table->string('image_path');
            $table->string('day');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dposts');
    }
}
