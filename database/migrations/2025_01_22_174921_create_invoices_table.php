<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estimate_id');
            $table->decimal('total', 10, 2);
            $table->date('due_date');
            $table->enum('status', ['Unpaid', 'Paid', 'Overdue'])->default('Unpaid');
            $table->timestamps();

            $table->foreign('estimate_id')->references('id')->on('estimates')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
