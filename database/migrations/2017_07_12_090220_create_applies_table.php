<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up(){
 	Schema::create('applies', function($table){
 	    $table->unsignedInteger('apply_id', true);
        $table->integer('user_id')->unsigned();
        $table->integer('job_id')->unsigned();
        $table->boolean('gender');
        $table->date('bday');
        $table->string('phone', 14);
        $table->text('resume');
        $table->boolean('approved')->default('0');
 		$table->timestamps();
 	});

      Schema::table('applies', function (Blueprint $table){
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('job_id')->references('job_id')->on('jobs')->onDelete('cascade');
      });
 }

 public function down()
 {
     Schema::table('applies', function (Blueprint $table) {
         $table->dropForeign('applies_user_id_foreign');
         $table->dropForeign('applies_job_id_foreign');
     });
     Schema::dropIfExists('applies');
 }
}