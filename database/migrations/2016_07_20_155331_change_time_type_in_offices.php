<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTimeTypeInOffices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->dropColumn('open_at');
            $table->dropColumn('close_at');
            $table->string('time_open');
            $table->string('time_close');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offices', function (Blueprint $table) {
            $table->dropColumn('time_open');
            $table->dropColumn('time_close');
            $table->time('open_at');
            $table->time('close_at');
        });
    }
}
