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
            $table->string('document', 250);
            $table->string('business_name', 250);
            $table->string('titular_cellphone', 250);
            $table->string('receiving_person', 250);
            $table->string('address', 250);
            $table->string('reference', 250);
            $table->string('equipment_type', 250);
            $table->string('model', 250);
            $table->string('range', 250);
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
        Schema::dropIfExists('import_sale_new');
    }
};
