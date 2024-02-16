<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Order\Enums\OrderStatus;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('truck_id')->constrained('trucks')->cascadeOnDelete();
            $table->foreignId('client_id')->constrained('users')->cascadeOnDelete();
            $table->unsignedInteger('fuel_volume')->default(0);
            $table->unsignedFloat('unit_price')->default(0);
            $table->unsignedFloat('total_price')->default(0);
            $table->unsignedFloat('latitude');
            $table->unsignedFloat('longitude');
            $table->string('address');
            $table->string('status')->default(OrderStatus::Pending);
            $table->timestamp('delivery_date');
            $table->timestamp('canceled_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
