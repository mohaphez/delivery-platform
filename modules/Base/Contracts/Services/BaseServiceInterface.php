<?php

declare(strict_types=1);

namespace Modules\Base\Contracts\Services;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseServiceInterface
{
    public function index(?array $column = ['*'], ?array $filters = null, ?string $sort = "desc", null|int|string $paginate = null): Collection|LengthAwarePaginator;

    public function find(int $id): ?Model;

    public function show(int $id): Model;

    public function create(array $data): Model;

    public function edit(int $id): Model;

    public function update(int $id, array $data): Model;

    public function destroy(int $id): void;

    public function firstOrCreate(array $attributes, array $data): Model;

    public function updateOrCreate(array $attributes, array $data): Model;

    public function getActiveItems(?array $column = ['*'], ?array $filters = null, ?string $sort = "desc", null|int|string $paginate = null): Collection|LengthAwarePaginator;
}
