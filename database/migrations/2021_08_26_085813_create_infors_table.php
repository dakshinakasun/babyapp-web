<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInforsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infors', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mother_height')->nullable();
            $table->string('mother_weight')->nullable();
            $table->string('waist_size')->nullable();
            $table->date('clinic_date')->nullable();
            $table->string('city');
            $table->string('district');
            $table->string('moh_area')->nullable();
            $table->string('phm_area')->nullable();
            $table->string('grama_division')->nullable();
            $table->char('father_mobile')->nullable();
            $table->char('midwife_mobile')->nullable();
            $table->string('working');
            $table->string('job_roll')->nullable();
            $table->string('income');
            $table->time('sleeping_time')->nullable();
            $table->time('wakeup_time')->nullable();
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
        Schema::dropIfExists('infors');
    }
}
