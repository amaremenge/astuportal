<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ses-student_evaluations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evaluation_session_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->timestamps();

            $table->foreign('evaluation_session_id')
                  ->references('id')->on('ses-evaluation_sessions');
            $table->foreign('student_id')
                  ->references('id')->on('astu-students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ses-student_evaluations');
    }
}
