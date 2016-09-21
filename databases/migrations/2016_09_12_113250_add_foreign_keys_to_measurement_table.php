<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMeasurementsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('measurements', function(Blueprint $table)
        {
            $table->foreign('sensor_id', 'fk_measurements_sensor1')->references('id')->on('sensor')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('measurements', function(Blueprint $table)
        {
            $table->dropForeign('fk_measurements_sensor1');
        });
    }

}
