<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentReplysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('commentReplys', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('tid');
        $table->unsignedInteger('cid');
        $table->string('content');
        $table->unsignedInteger('from_uid');
        $table->unsignedInteger('to_uid');
        $table->string('utime');
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
