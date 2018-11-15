<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company_name')->nullable();
            $table->string('location')->nullable();
            $table->integer('type_salary')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('percent_work')->nullable();
            $table->string('must_have')->nullable();
            $table->string('nice_have')->nullable();
            $table->string('languages')->nullable();
            $table->integer('type_work')->nullable();
            $table->integer('project_industry')->nullable();
            $table->integer('company_size')->nullable();
            $table->integer('project_team_size')->nullable();
            $table->integer('percent_workload')->nullable();
            $table->integer('day_holiday')->nullable();
            $table->datetime('office_hours_from')->nullable();
            $table->datetime('office_hours_to')->nullable();
            $table->integer('day_travel')->nullable();
            $table->integer('day_relocation')->nullable();
            $table->string('upload_file')->nullable();
            $table->timestamps();
        });
        Schema::table('applications', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
