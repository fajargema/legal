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
            $table->string('nik')->unique();
            $table->string('category');
            $table->string('kartu_konsumen')->nullable();
            $table->string('mpp')->nullable();
            $table->string('fpa')->nullable();
            $table->string('sp3k')->nullable();
            $table->string('data_diri')->nullable();
            $table->string('pk')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('spr')->nullable();
            $table->string('bphtb')->nullable();
            $table->string('ajb')->nullable();

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
