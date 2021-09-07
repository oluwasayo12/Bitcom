<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentnameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agentname', function (Blueprint $table) {
            $table->integer('name_id', true);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->nullable();
            $table->char('phone', 13);
            $table->integer('pollingunit_uniqueid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agentname');
    }
}
