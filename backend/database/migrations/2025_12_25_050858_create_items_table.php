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
        Schema::create('items', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('company_id')->nullable();
            $table->uuid('item_type_id')->nullable();
            $table->uuid('item_group_id')->nullable();
            $table->uuid('item_account_group_id')->nullable();
            $table->uuid('item_unit_id')->nullable();
            $table->string('code')->unique();
            $table->string('label');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
