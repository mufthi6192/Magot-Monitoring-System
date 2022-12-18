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
        Schema::create('output_models', function (Blueprint $table) {
            $table->id();
            $table->enum('pump_a',['on','off'])->default('off');
            $table->enum('pump_b',['on','off'])->default('off');
            $table->enum('lamp_a',['on','off'])->default('off');
            $table->enum('lamp_b',['on','off'])->default('off');
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
        Schema::dropIfExists('output_models');
    }
};
