<?php

use App\Models\Legal;
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
        Schema::create('delete_legals', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class)->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignIdFor(Legal::class)->references('id')->on('legals')->onUpdate('cascade')->onDelete('cascade');
            $table->string('reason');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delete_legals');
    }
};
