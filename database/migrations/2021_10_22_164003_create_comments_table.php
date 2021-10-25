<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('comments', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->constrained()->cascadeOnDelete();
      $table->foreignId('post_id')->constrained()->cascadeOnDelete();
      //same as below code
      /* $table->unsignedBigInteger('post_id'); */
      /* $table->foreign('post_id')->references('id')->on('posts')->cascadeOnDelete(); */
      //foreign constraint, this comment only belongs to a post, if that post is deleted its comments should be deleted as well.
      $table->text('body');
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
    Schema::dropIfExists('comments');
  }
}
