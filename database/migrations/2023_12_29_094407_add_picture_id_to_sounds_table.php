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
        Schema::table('sounds', function (Blueprint $table) {
            $table->unsignedBigInteger('picture_id')->nullable();
            $table->foreign('picture_id')->references('id')->on('pictures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sounds', function (Blueprint $table) {
            $table->dropForeign('sounds_picture_id_foreign');
            $table->dropColumn('picture_id');
        });
    }
};
