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
        Schema::create('data_alternatif', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->double(('IPK'));
            $table->double(('tes_pemrograman'));
            $table->double(('kemampuan_mengajar'));
            $table->double(('nilai_referensi'));
            $table->double(('kerja_sama'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_alternatif');
    }
};
