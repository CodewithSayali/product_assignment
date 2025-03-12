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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->tinyInteger('status')->nullable()->comment('NULL => Pending, 0 => Rejected, 1=> Accepted');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->timestamp('modified_on')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
