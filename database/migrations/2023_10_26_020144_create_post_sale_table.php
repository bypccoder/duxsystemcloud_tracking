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
        Schema::create('post_sale', function (Blueprint $table) {
            $table->id();
            $table->string('document', 250);
            $table->string('business_name', 250);
            $table->string('titular_cellphone', 250);
            $table->string('receiving_person', 250);
            $table->string('address', 250);
            $table->string('reference', 250);
            $table->string('equipment_type', 250);
            $table->string('model_text', 250);
            $table->string('old_serial', 250);
            $table->string('range', 250);
            $table->enum('record_type', ['formulario', 'importador']);
            $table->unsignedBigInteger('management_type_id');
            $table->foreign('management_type_id')->references('id')->on('management_types');
            $table->unsignedBigInteger('warehouse_state_type_id');
            $table->foreign('warehouse_state_type_id')->references('id')->on('warehouse_state_types');
            $table->string('new_serial', 250);
            $table->date('change_date');
            $table->date('pickup_date');
            $table->date('support_date');
            $table->date('survey_date');
            $table->unsignedBigInteger('survey_id');
            $table->foreign('survey_id')->references('id')->on('surveys');
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('models');
            $table->unsignedBigInteger('equipment_id');
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->string('serial', 250);
            $table->unsignedBigInteger('result_1_back_id');
            $table->foreign('result_1_back_id')->references('id')->on('result_1_back');
            $table->unsignedBigInteger('result_2_back_id');
            $table->foreign('result_2_back_id')->references('id')->on('result_2_back');
            $table->date('agenda_date');
            $table->string('agenda_time', 250);
            $table->date('delivery_date');
            $table->string('delivery_time', 250);
            $table->unsignedBigInteger('motorized_id');
            $table->foreign('motorized_id')->references('id')->on('users');
            $table->text('observation');
             $table->integer('status_id')->default(1);
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
        Schema::table('post_sale', function (Blueprint $table) {
            $table->dropForeign(['management_type_id']);
            $table->dropForeign(['warehouse_state_type_id']);
            $table->dropForeign(['survey_id']);
            $table->dropForeign(['model_id']);
            $table->dropForeign(['equipment_id']);
            $table->dropForeign(['result_1_back_id']);
            $table->dropForeign(['result_2_back_id']);
            $table->dropForeign(['motorized_id']);
        });

        Schema::dropIfExists('post_sale');
    }
};
