<?php

use App\Models\Package;
use App\Models\Receiver;
use App\Models\Sender;
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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sender::class);
            $table->foreignIdFor(Receiver::class);
            $table->string('tracking_code', 24)->unique();
            $table->enum('service_type', ['standard', 'express', 'priority', 'international'])->default('standard');
            $table->enum('status', ['pending', 'shipped', 'delivered'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
