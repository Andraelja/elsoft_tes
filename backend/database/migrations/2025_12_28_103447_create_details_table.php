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
        Schema::create('details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('index')->nullable();
            $table->uuid('Item');
            $table->string('ItemName');
            $table->integer('Quantity');
            $table->uuid('ItemUnit');
            $table->string('ItemUnitName');
            $table->text('Note')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
