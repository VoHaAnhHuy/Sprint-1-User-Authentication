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
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('title'); // auto generated: option_1 / option_2 / option_3
            $table->double('price');
            $table->integer('position')->default(0);
            $table->double('compare_at_price')->nullable();
            $table->string('option_1');
            $table->string('option_2')->nullable();
            $table->string('option_3')->nullable();
            $table->integer('inventory_quantity')->default(0);
            $table->string('image_url')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
