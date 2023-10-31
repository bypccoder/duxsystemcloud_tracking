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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_sale_id');
            $table->foreign('post_sale_id')->references('id')->on('post_sale');
            $table->string('start', 250);
            $table->string('arrival', 250);
            $table->unsignedBigInteger('motorized_status_id');
            $table->foreign('motorized_status_id')->references('id')->on('motorized_status');
            $table->string('audio', 250);
            $table->string('files', 250);
            $table->string('token', 250);
            $table->text('observation');
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
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['post_sale_id']);
            $table->dropForeign(['motorized_status_id']);
        });

        Schema::dropIfExists('tasks');
    }
};
