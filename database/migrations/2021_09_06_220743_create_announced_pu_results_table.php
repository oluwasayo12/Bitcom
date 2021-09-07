<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncedPuResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announced_pu_results', function (Blueprint $table) {
            $table->integer('result_id', true);
            $table->string('polling_unit_uniqueid', 50);
            $table->foreign('polling_unit_uniqueid')->references('uniqueid')->on('polling_unit');
            $table->char('party_abbreviation', 4);
            $table->integer('party_score');
            $table->string('entered_by_user', 50);
            $table->dateTime('date_entered');
            $table->string('user_ip_address', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announced_pu_results');
    }
}
