<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsDonationNeeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('donations', function (Blueprint $table) {
            $table->string('ref')->default(0);
        });

        Schema::table('needs', function (Blueprint $table) {
            $table->string('ref')->default(0);
        });

        //Update ref column
        $sql = "UPDATE donations SET ref= concat('O',id) WHERE id>0";
        DB::connection()->getPdo()->exec($sql);

        $sql = "UPDATE needs SET ref= concat('R',id) WHERE id>0";
        DB::connection()->getPdo()->exec($sql);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();

        Schema::table('donations', function (Blueprint $table) {
            $table->dropColumn('ref');
        });

        Schema::table('needs', function (Blueprint $table) {
            $table->dropColumn('ref');
        });

        Schema::disableForeignKeyConstraints();
    }
}
