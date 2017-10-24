<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitbucketUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitbucket_users', function (Blueprint $table) {
            $table->string('user_id');
            $table->string('nickname');
            $table->string('avatar');
            $table->string('website')->nullable();
            $table->timestamps();
            $table->primary('user_id');
            $table->foreign('user_id')->references('bitbucket_id')->on('users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitbucket_users');
    }
}
