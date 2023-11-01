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
            $table->string('equipment_type', 250)->nullable();
            $table->string('model_text', 250)->nullable();
            $table->string('old_serial', 250)->nullable();
            $table->string('survey_text', 250)->nullable();
            $table->unsignedBigInteger('time_ranges_id');
            $table->foreign('time_ranges_id')->references('id')->on('time_ranges');
            $table->enum('record_type', ['formulario', 'importacion','app']);
            $table->unsignedBigInteger('management_type_id');
            $table->foreign('management_type_id')->references('id')->on('management_types');
            $table->unsignedBigInteger('warehouse_state_type_id')->nullable();
            $table->foreign('warehouse_state_type_id')->references('id')->on('warehouse_state_types');
            $table->string('new_serial', 250)->nullable();
            $table->date('change_date')->nullable();
            $table->date('sale_date')->nullable();
            $table->date('pickup_date')->nullable();
            $table->date('support_date')->nullable();
            $table->date('survey_date')->nullable();
            $table->unsignedBigInteger('survey_id')->nullable();
            $table->foreign('survey_id')->references('id')->on('surveys');
            $table->unsignedBigInteger('model_id')->nullable();
            $table->foreign('model_id')->references('id')->on('models');
            $table->unsignedBigInteger('equipment_id')->nullable();
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->string('serial', 250)->nullable();
            $table->string('email_customer', 250)->nullable();
            $table->unsignedBigInteger('result1_backs_id')->nullable();
            $table->foreign('result1_backs_id')->references('id')->on('result1_backs');
            $table->unsignedBigInteger('result2_backs_id')->nullable();
            $table->foreign('result2_backs_id')->references('id')->on('result2_backs');
            $table->date('diary_date')->nullable();
            $table->string('diary_time', 250)->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('delivery_time', 250)->nullable();
            $table->unsignedBigInteger('motorized_id')->nullable();
            $table->foreign('motorized_id')->references('id')->on('users');
            $table->text('observation')->nullable();
            $table->integer('status_id')->default(1);
            $table->integer('created_by');
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
            $table->dropForeign(['time_ranges_id']);
            $table->dropForeign(['management_type_id']);
            $table->dropForeign(['warehouse_state_type_id']);
            $table->dropForeign(['survey_id']);
            $table->dropForeign(['model_id']);
            $table->dropForeign(['equipment_id']);
            $table->dropForeign(['result1_backs_id']);
            $table->dropForeign(['result2_backs_id']);
            $table->dropForeign(['motorized_id']);
        });

        Schema::dropIfExists('post_sale');
    }
};
