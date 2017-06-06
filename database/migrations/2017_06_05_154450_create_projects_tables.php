<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('projects', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('project_name',255);
    		$table->text('description')->nullable();
    		$table->text('purpose')->nullable();
    		$table->text('address')->nullable();
    		$table->string('website',255);
    		$table->string('email',255);
    		$table->string('geo_location',255);
    		$table->text('other_details')->nullable();
    		$table->timestamps();
    	});
    	
    	Schema::create('project_members', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('name',255);
    		$table->text('address')->nullable();
    		$table->string('email')->nullable();
    		$table->string('contact')->nullable();
    		$table->string('website',255);
    		$table->string('skype',255);
    		$table->string('type',255);
    		$table->integer('user_id')->nullable();
    		$table->timestamps();
    	});
    	
    	Schema::create('resources', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('name',255);
    		$table->text('type')->nullable();
    		$table->timestamps();
    	});
    	
    	Schema::create('project_resources', function (Blueprint $table) {
    		$table->integer('project_id');
    		$table->string('resource_id',255);
    		$table->text('quantity')->nullable();
    		$table->string('location',255);
    		$table->timestamps();
    		$table->primary(array('project_id', 'resource_id'));
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_resources');
		Schema::dropIfExists('resources');
		Schema::dropIfExists('project_members');
		Schema::dropIfExists('projects');
    }
}
