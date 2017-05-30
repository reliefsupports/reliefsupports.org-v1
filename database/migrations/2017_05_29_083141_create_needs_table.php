<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('telephone',255);
            $table->text('address');
            $table->string('city',255);
            $table->text('needs')->nullable();
            $table->integer('heads')->nullable();
            $table->string('source',11);
            $table->integer('status')->->default(0);
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
        Schema::dropIfExists('needs');
    }
}
