<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesTableJawaban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban', function (Blueprint $table) {
            $table->increments('id_jawaban');
            $table->string('isi', 200);
            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();
            $table->integer('vote')->nullable();
            $table->integer('id_pertanyaan')->unsigned();
            $table->foreign('id_pertanyaan')->references('id_pertanyaan')->on('pertanyaan');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jawaban');
    }
}
