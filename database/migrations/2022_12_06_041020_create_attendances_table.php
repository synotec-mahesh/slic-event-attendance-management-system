<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->string('advisor_code')->nullable();
            $table->string('bancassurance_sales_officer')->nullable();
            $table->string('team_leader')->nullable();
            $table->string('group_leader')->nullable();
            $table->string('marketing_executive')->nullable();
            $table->string('branch_manager')->nullable();
            $table->string('regional_manager')->nullable();
            $table->string('head_office_unit')->nullable();
            $table->string('name');
            $table->string('nic');
            $table->string('branch');
            $table->string('region');
            $table->string('table_no');
            $table->string('chek_in_time')->nullable();
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
        Schema::dropIfExists('attendances');
    }
};
