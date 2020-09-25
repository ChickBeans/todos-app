<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToFolders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('users', function ( Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name', 30);
        //     $table->string('email', 30);
        //     $table->string('password', 30);
        //     $table->timestamps();
        // });

        Schema::table('folders', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();

            // 外部キーを設定する
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
        Schema::table('folders', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
