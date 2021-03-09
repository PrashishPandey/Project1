<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('user_id')->length(11)->unsigned();
            $table->primary('user_id');
            $table->integer('group_id')->length(11)->unsigned();
            $table->foreign('group_id')->references('group_id')->on('user_groups');
            $table->string('user_name',55);
            $table->string('user_pwd',55);
            $table->string('user_display_name',55);
            $table->string('user_mobile',11);
            $table->string('user_email',55);
            $table->timestamp('registered_date');
            $table->tinyInteger('user_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
