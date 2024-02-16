<?php

declare(strict_types=1);

namespace Modules\Tenant\Database\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Support\Enums\V1\Status\Status;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table): void {
            $table->string('id')->primary();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('status')->default(Status::Active);
            $table->timestamps();
            $table->json('data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
