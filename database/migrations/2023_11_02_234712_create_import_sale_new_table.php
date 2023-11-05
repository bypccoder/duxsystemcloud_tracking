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
        Schema::create('import_sale_new', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('total_rows');
            $table->unsignedInteger('errors_rows')->default(0);
            $table->unsignedInteger('success_rows')->default(0);
            $table->string('url_success_rows', 250)->nullable();
            $table->string('url_errors_rows', 250)->nullable();
            // $table->string('document', 250);
            // $table->string('business_name', 250);
            // $table->string('titular_cellphone', 250);
            // $table->string('receiving_person', 250);
            // $table->string('address', 250);
            // $table->string('reference', 250);
            // $table->string('equipment_type', 250)->nullable();
            // $table->string('model_text', 250);
            // $table->string('old_serial', 250)->nullable();
            // $table->string('survey_text', 250)->nullable();
            // $table->unsignedBigInteger('time_ranges_id');
            // $table->foreign('time_ranges_id')->references('id')->on('time_ranges');
            // $table->unsignedBigInteger('management_type_id');
            // $table->foreign('management_type_id')->references('id')->on('management_types');
            // $table->string('new_serial', 250)->nullable();
            // $table->date('change_date')->nullable();
            // $table->date('sale_date')->nullable();
            // $table->date('pickup_date')->nullable();
            // $table->date('support_date')->nullable();
            // $table->date('survey_date')->nullable();
            // $table->string('email_customer', 250)->nullable();
            // $table->text('observation');
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
        Schema::dropIfExists('import_sale_new');
    }
};
