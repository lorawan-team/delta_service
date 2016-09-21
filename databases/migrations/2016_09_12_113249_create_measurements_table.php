<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMeasurementsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sensor_id')->unsigned()->index('fk_measurements_sensor1_idx');
            $table->integer('value');
            $table->dateTime('created_at');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('measurements');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

}
