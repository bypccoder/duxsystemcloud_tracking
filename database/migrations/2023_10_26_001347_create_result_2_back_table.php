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
        Schema::create('result2_backs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('result1_backs_id');
            $table->foreign('result1_backs_id')->references('id')->on('result1_backs');
            $table->string('result', 250);
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
        Schema::table('result2_backs', function (Blueprint $table) {
            $table->dropForeign(['result1_backs_id']);
        });

        Schema::dropIfExists('result2_backs');
    }
};
