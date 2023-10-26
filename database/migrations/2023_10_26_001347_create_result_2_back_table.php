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
        Schema::create('result_2_back', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('result_1_back_id');
            $table->foreign('result_1_back_id')->references('id')->on('result_1_back');
            $table->string('result', 250);
            $table->integer('status_id');
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
        Schema::table('result_2_back', function (Blueprint $table) {
            $table->dropForeign(['result_1_back_id']);
        });

        Schema::dropIfExists('result_2_back');
    }
};
