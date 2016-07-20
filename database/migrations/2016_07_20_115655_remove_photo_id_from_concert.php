<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePhotoIdFromConcert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('concerts', function (Blueprint $table) {
            $table->dropColumn('photo_id');
            $table->dropColumn('audio_id');
            $table->string('audio_path');
            $table->string('photo_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('concerts', function (Blueprint $table) {
            $table->integer('photo_id');
            $table->integer('audio_id');
            $table->dropColumn('audio_path');
            $table->dropColumn('photo_path');
        });
    }
}
