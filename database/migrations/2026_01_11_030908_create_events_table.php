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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('event_date');
            $table->string('location');
            $table->string('photo');
            $table->string('registration_link')->nullable();
            $table->unsignedBigInteger('speaker_id'); // relasi ke speakers
            $table->string('category');
            $table->decimal('ticket_price', 12, 2);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('speaker_id')->references('id')->on('speakers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
