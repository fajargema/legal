<?php

use App\Models\Residence;
use App\Models\User;
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
        Schema::create('legals', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Residence::class)->references('id')->on('residences')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(User::class)->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('category');
            $table->string('kartu_konsumen');
            $table->string('mpp');
            $table->string('fpa');
            $table->string('sp3k');
            $table->string('data_diri');
            $table->string('pk');
            $table->string('sertifikat');
            $table->string('spr');
            $table->string('bphtb');
            $table->string('ajb');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legals');
    }
};
