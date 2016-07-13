<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatForumPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum-posts', function (Blueprint $table) {
            $table->increments('post_id')->key();
            $table->string('post_title');
            $table->string('post_content', 1000);
            $table->string('submitter_id');
            $table->integer('category');
            $table->integer('points');
            $table->integer('reply_count');
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
        Schema::drop('forum-posts');
    }
}
