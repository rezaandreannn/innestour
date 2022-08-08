<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegosiasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negosiasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('paket_id');
            $table->string('harga');
            $table->enum('status', ['pending', 'acc', 'tolak'])
                ->default('pending');
            $table->string('keterangan')->nullable();
            $table->timestamps();


            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('paket_id')
                ->references('id')
                ->on('pakets')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('negosiasis');
    }
}
