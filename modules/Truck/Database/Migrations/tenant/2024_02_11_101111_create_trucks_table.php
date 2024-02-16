<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Support\Enums\V1\Status\Status;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('trucks', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('driver_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->string('name');
            $table->string('brand');
            $table->string('model');
            $table->string('plate_number');
            $table->string('color');
            $table->string('status')->default(Status::Active);
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
        Schema::dropIfExists('trucks');
    }
};
