<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('media_type_id')->nullable();
            $table->integer('condition_id')->nullable();
            $table->string('title');
            $table->string('year')->nullable();
            $table->string('directors')->nullable();
            $table->string('actors')->nullable();
            $table->string('format')->nullable();
            $table->string('languages')->nullable();
            $table->string('subtitles')->nullable();
            $table->string('region')->nullable();
            $table->string('aspect_ratio')->nullable();
            $table->string('fsk')->nullable();
            $table->string('studio')->nullable();
            $table->string('release_date')->nullable();
            $table->string('theatrical_release_date')->nullable();
            $table->string('run_time')->nullable();
            $table->string('ean')->nullable();
            $table->string('upc')->nullable();
            $table->string('isbn')->nullable();
            $table->string('asin')->nullable();
            $table->longText('note')->nullable();
            $table->longText('private_note')->nullable();
            $table->boolean('for_change')->default(false);
            $table->string('media_languages')->nullable();
            $table->string('price')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('videos');
    }
}
