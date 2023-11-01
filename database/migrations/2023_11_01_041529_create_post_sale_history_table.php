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
        Schema::create('post_sale_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_sale_id');
            $table->string('type_row');
            $table->string('field_name');
            $table->string('field_description');
            $table->string('old_value')->nullable();
            $table->string('new_value')->nullable();
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_sale_history');
    }
};
