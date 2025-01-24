<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('proposals', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('lead_id');
        $table->string('title');
        $table->text('details');
        $table->decimal('amount', 10, 2);
        $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
        $table->timestamps();

        // Set the table engine to InnoDB
        $table->engine = 'InnoDB';

        // Foreign key constraints
        $table->foreign('lead_id')->references('id')->on('leads')->onDelete('cascade');
    });
}

    
    

    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
