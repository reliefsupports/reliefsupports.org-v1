<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('region');
            $table->string('name')->nullable();
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();

            $table->integer('families')->nullable();
            $table->integer('men')->nullable();
            $table->integer('women')->nullable();
            $table->integer('children')->nullable();
            $table->integer('babies')->nullable();
            $table->integer('pregnents')->nullable();
            $table->integer('heart_patients')->nullable();
            $table->integer('blood_pressure_patients')->nullable();
            $table->integer('special_needs')->nullable();
            $table->integer('other_patients')->nullable();
            $table->integer('elders')->nullable();

            $table->string('location');
            $table->integer('count')->nullable();
            $table->string('geograghy')->nullable();
            $table->string('route')->nullable();
            $table->string('pre_max_water_level')->nullable();
            $table->string('pre_settle_time')->nullable();

            $table->string('transport_categories')->nullable();
            $table->string('transport_suppliers')->nullable();
            $table->string('boats_usable_locations')->nullable();
            $table->string('current_wires_locations')->nullable();
            $table->string('tree_cutter_suppliers')->nullable();

            $table->integer('water_motors')->nullable();
            $table->integer('water_tanks')->nullable();
            $table->integer('lifesaving_jackets')->nullable();
            $table->integer('sanitary')->nullable();
            $table->integer('generators')->nullable();
            $table->integer('torches')->nullable();
            $table->integer('mosquito_nets_pillows')->nullable();
            $table->integer('cooking_instruments')->nullable();

            $table->integer('deaths')->nullable();
            $table->integer('casualties')->nullable();
            $table->integer('full_damage_houses')->nullable();
            $table->integer('half_damage_houses')->nullable();
            $table->integer('full_damage_business')->nullable();
            $table->integer('half_damage_business')->nullable();

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
        Schema::dropIfExists('camps');
    }
}
