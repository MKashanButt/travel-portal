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
        Schema::create('agent_sale', function (Blueprint $table) {
            $table->id();
            $table->foreignId('credit_type_id')->nullable()->constrained('credit_types')->onDelete('SET NULL');
            $table->foreignId('airline_id')->nullable()->constrained('airlines')->onDelete('SET NULL');
            $table->foreignId('gds_id')->nullable()->constrained('gds')->onDelete('SET NULL');
            $table->foreignId('pcc_id')->nullable()->constrained('pccs')->onDelete('SET NULL');
            $table->string('pnr_number');
            $table->string('pax_name');
            $table->string('amount');
            $table->time('time_limit')->nullable();
            $table->foreignId('visa_type_id')->nullable()->constrained('visa_types')->onDelete('SET NULL');
            $table->string('comment')->nullable();
            $table->enum('status', ["Waiting", "Processing", "Issued"]);
            $table->enum('type', ["ticket", "Void", "Refund"])->default('ticket');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('SET NULL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_sale');
    }
};
