<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mposts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('etitle');
            $table->string('stitle');
            $table->mediumText('ehighlight');
            $table->mediumText('shighlight');
            $table->longText('edescription');
            $table->longText('sdescription');
            $table->string('image_path');
            $table->string('month');
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
        //
    }
}
