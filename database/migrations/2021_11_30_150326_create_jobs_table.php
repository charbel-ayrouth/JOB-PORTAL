<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('JobTitle');
            $table->string('Field');
            $table->longText('Requirements');
            $table->longText('Description');
            $table->string('JobSkillLevel');
            $table->foreignId('location_id')->constrained('locations')->onDelete('Cascade');
            $table->foreignId('Jobprovider_id')->constrained('job_providers')->onDelete('Cascade');
            $table->time('ValidationTime')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
