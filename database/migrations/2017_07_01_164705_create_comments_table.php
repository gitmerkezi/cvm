<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up(){
 	Schema::create('comments', function($table){
 		$table->unsignedInteger('comment_id', true);
 		$table->integer('job_id')->unsigned();
 		$table->string('sender_name',255);
 		$table->string('sender_email',255);
        $table->text('comment');
        $table->boolean('approved');
        $table->string('ip_address',15);
 		$table->timestamps();
 	});

  Schema::table('comments', function (Blueprint $table){
    $table->foreign('job_id')->references('job_id')->on('jobs')->onDelete('cascade');
  });
 }

 public function down()
 {
     Schema::table('comments', function (Blueprint $table) {
         $table->dropForeign('comments_job_id_foreign'); //emin degilim
     });
     Schema::dropIfExists('comments');
 }
}
