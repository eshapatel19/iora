<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('employee_id');
            $table->string('client_name');
            $table->integer('client_number');
            $table->string('address');
            $table->integer('postcode');
            $table->foreignId('city_id');
            $table->integer('key_number');
            $table->date('start_date');
            $table->integer('phone_number');
            $table->string('google_map_url');
            $table->time('implementaion_time');
            $table->time('from_time');
            $table->integer('rotation_type');
            $table->string('pdf');
            $table->string('person_name');
            $table->integer('status');
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
        Schema::dropIfExists('objects');
    }
}
