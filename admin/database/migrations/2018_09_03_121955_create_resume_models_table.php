<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    $table->increments('id');
    
    $table->timestamps();
    public function up()
    {
        Schema::create('resume', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seeker_id')->unsigned();
            $table->foreign('seeker_id')->references('id')->on('seeker')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('resume_type')->unsigned();
            $table->foreign('resume_type')->references('id')->on('resume_types');
            $table->integer('resume_by_roles')->unsigned();
            $table->foreign('resume_by_roles')->references('id')->on('resume_by_roles');
            $table->integer('qualification')->unsigned();
            $table->foreign('qualification')->references('id')->on('qualifications');
            $table->integer('resume_location')->unsigned();
            $table->foreign('resume_location')->references('id')->on('location');
            $table->string('year_of_passing')->nullable();
            $table->string('percentage_or_cgpa')->nullable();
            $table->integer('specialization')->unsigned();
            $table->foreign('specialization')->references('id')->on('specializations');
            $table->string('experience');
            $table->text('resume_discription');
            $table->string('min_sal');
            $table->string('max_sal');
            $table->string('per');
            $table->string('vacancies');
            $table->date('last_date');
            $table->text('process');
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
        Schema::dropIfExists('resume');
    }
}
