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
    		$table->string('name',255);
    		$table->text('description')->nullable();
    		$table->text('purpose')->nullable();
    		$table->text('address')->nullable();
    		$table->string('website',255)->nullable();
    		$table->string('email',255)->nullable();
    		$table->string('geo_location',255)->nullable();
    		$table->text ( 'other_details' )->nullable();
			$table->timestamps ();
		} );
		
		Schema::create ( 'project_members', function (Blueprint $table) {
			$table->increments( 'id' );
			$table->integer('project_id')->unsigned();
			$table->string('first_name',255)->nullable();
			$table->string('last_name',255)->nullable();
			$table->text('address')->nullable();
			$table->string('email',255 )->nullable();
			$table->string('contacts',255);
			$table->string('website',255);
			$table->string('skype',255);
			$table->string('type',16);
			$table->integer('active_status')->default(1);
			$table->integer('user_id')->nullable();
			$table->string ('location',255)->nullable();
			$table->string ('geo_location',255)->nullable();
			$table->timestamps();
			$table->foreign('project_id')->references('id')->on('projects');
// 			$table->foreign('user_id')->references('id')->on('users');
		} );
		
		Schema::create('resources', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name',255);
			$table->text('type')->nullable();
			$table->timestamps();
		});
		
		Schema::create ('project_resources', function (Blueprint $table) {
			$table->integer('project_id')->unsigned();
			$table->integer('resource_id')->unsigned();
			$table->integer('quantity')->nullable();
			$table->text ('availability')->nullable();
			$table->string('location',255)->nullable();
			$table->string ('geo_location', 255)->nullable();
    		$table->text('other_details')->nullable();
    		$table->timestamps();
    		$table->foreign('project_id')->references('id')->on('projects');
    		$table->foreign('resource_id')->references('id')->on('resources');
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
