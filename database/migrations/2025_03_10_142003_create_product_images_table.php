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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_xid');
            $table->string('product_image')->nullable();
            $table->tinyInteger('status')->nullable()->comment('NULL => Pending, 0 => Rejected, 1=> Accepted');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamp('created_on')->nullable();
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->timestamp('modified_on')->nullable();
            $table->timestamps();

            $table->foreign('product_xid')->references('id')->on('products')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
