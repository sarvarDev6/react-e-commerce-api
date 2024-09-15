<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('product_img')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_price')->nullable();
            $table->string('region')->nullable();
            $table->string('aggree_with_pay')->nullable();
            $table->string('phone')->nullable();
            $table->string('order_comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
