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
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->foreignId('destination_id')->constrained()->cascadeOnDelete();
        $table->date('booking_date');
        $table->integer('participant_count')->default(1);
        $table->decimal('base_price', 12, 2)->default(0);
        $table->decimal('service_total', 12, 2)->default(0);
        $table->decimal('total_price', 12, 2)->default(0);
        $table->enum('status', ['pending', 'waiting_payment', 'paid', 'confirmed', 'completed', 'cancelled'])->default('pending');
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
