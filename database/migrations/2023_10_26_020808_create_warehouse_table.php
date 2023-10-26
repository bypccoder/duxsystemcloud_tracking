<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('warehouse', function (Blueprint $table) {
            $table->id();
            $table->string('courier', 250);
            $table->string('guide', 250);
            $table->string('serial', 250);
            $table->string('master_box', 250);
            $table->string('dispatch_date', 250);
            $table->string('delivery_date', 250);
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('models');
            $table->unsignedBigInteger('equipment_id');
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->unsignedBigInteger('warehouse_state_type_id');
            $table->foreign('warehouse_state_type_id')->references('id')->on('warehouse_state_types');
            $table->text('observation');
            $table->integer('created by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('warehouse', function (Blueprint $table) {
            $table->dropForeign(['model_id']);
            $table->dropForeign(['equipment_id']);
            $table->dropForeign(['warehouse_state_type_id']);
        });

        Schema::dropIfExists('warehouse');
    }
};
