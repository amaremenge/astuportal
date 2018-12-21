<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('academic-departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('duration')->default(5);
            $table->string('code')->unique();
            $table->integer('school_id')->unsigned();
            $table->text('description')->nullable();
            $table->foreign('school_id')
                  ->references('id')->on('academic-schools');
            $table->unsignedInteger('change_id')->nullable();

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
        Schema::dropIfExists('academic-departments');
    }
}
