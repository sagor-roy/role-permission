<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreadentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creadentials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('client_id')->nullable();
            $table->string('secret_id')->nullable();
            $table->string('redirect')->nullable();
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
        Schema::dropIfExists('creadentials');
    }
}
