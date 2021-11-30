<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_providers', function (Blueprint $table) {
            $table->id();
            $table->string('CompanyField');
            $table->longText('CompanyDescription');
            $table->string('CompanyTitle');
            $table->foreignId('user_id')->constrained('users')->onDelete('Cascade');
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
        Schema::dropIfExists('job_providers');
    }
}
