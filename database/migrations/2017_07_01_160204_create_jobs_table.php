<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up(){
 	Schema::create('jobs', function($table){
      $table->unsignedInteger('job_id', true);
      $table->integer('user_id')->unsigned();
      $table->string('job_position', 255); //varchar(255)
      $table->string('job_location', 255);
      $table->text('job_details');
      $table->boolean('published'); //yayın durumu "boolean"
      $table->timestamps(); //oluşturulma ve düzenlenme tarihi "timestamp"
      });

    Schema::table('jobs', function (Blueprint $table){
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
         Schema::table('jobs', function (Blueprint $table) {
             $table->dropForeign('jobs_user_id_foreign');
         });
         Schema::dropIfExists('jobs');
     }
}
