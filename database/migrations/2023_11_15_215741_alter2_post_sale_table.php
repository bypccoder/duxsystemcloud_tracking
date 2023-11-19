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
        Schema::table('post_sale', function (Blueprint $table) {
            $table->unsignedBigInteger('post_sale_status_id')->nullable()->default(1);
            $table->foreign('post_sale_status_id')->references('id')->on('post_sale_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
