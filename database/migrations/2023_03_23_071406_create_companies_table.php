<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('billing_address_id')->nullable();
            $table->foreignId('business_address_id')->nullable();
            $table->string('name');
            $table->string('legal_name')->nullable();
            $table->integer('vatId')->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('contact_number')->nullable();
            $table->string('website')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
