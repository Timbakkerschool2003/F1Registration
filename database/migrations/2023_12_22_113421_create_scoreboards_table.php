<?php

// database/migrations/2023_12_22_000000_create_scoreboards_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreboardsTable extends Migration
{
    public function up()
    {
        Schema::create('scoreboards', function (Blueprint $table) {
            $table->id();
            $table->string('time');
            $table->bigInteger('drivers_id')->unsigned();
            $table->foreign('drivers_id')->references('id')->on('drivers');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('scoreboards');
    }
}
