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
            $table->string('team_leader_code')->nullable();
            $table->string('group_leader_code')->nullable();
            $table->string('epf');
            $table->string('name');
            $table->string('nic');
            $table->string('branch');
            $table->string('region');
            $table->string('chek_in_time')->nullable();
            $table->string('table_no');
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
