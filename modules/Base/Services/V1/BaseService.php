<?php

declare(strict_types=1);

namespace Modules\Base\Services\V1;

use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Modules\Base\Contracts\Services\BaseServiceInterface;
use Modules\Support\Enums\V1\Status\Status;
use Prettus\Repository\Contracts\RepositoryInterface;

abstract class BaseService implements BaseServiceInterface
{
    protected $expire;
    protected RepositoryInterface $model;

    public function __construct()
    {
        $this->makeModel();
        $this->expire = Carbon::now()->addMinutes(config('cache.default_expire', 10));
    }

    abstract public function model(): RepositoryInterface;

    public function makeModel()
    {
        $model = $this->model();

        if ( ! $model instanceof RepositoryInterface) {
            throw new Exception("Class Repository must be an instance of Illuminate\\Prettus\\Repository\\Contracts\\RepositoryInterface");
        }

        return $this->model = $model;
    }


    public function index(?array $column = ['*'], ?array $filters = null, ?string $sort = "desc", null|int|string $paginate = null): Collection|LengthAwarePaginator
    {
        $query = $this->model
            ->select($column)
            ->when($filters, function ($q) use ($filters): void {
                $q->filter($filters);
            })
            ->orderBy('id', $sort);

        return (int)$paginate > 0 ? $query->paginate($paginate) : $query->get();
    }

    public function getActiveItems(?array $column = ['*'], ?array $filters = null, ?string $sort = "desc", null|int|string $paginate = null): Collection|LengthAwarePaginator
    {
        $query = $this->model
            ->select($column)
            ->when($filters, function ($q) use ($filters): void {
                $q->filter($filters);
            })
            ->where('status', Status::Active->value)
            ->orderBy('id', $sort);

        return (int)$paginate > 0 ? $query->paginate($paginate) : $query->get();
    }

    public function find(int $id): ?Model
    {
        return $this->model->where('id', $id)->first();
    }

    public function show(int $id): Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function edit(int $id): Model
    {
        return $this->model->find($id)->toBase();
    }

    public function update(int $id, array $data): Model
    {
        return $this->model->update($data, $id);
    }

    public function destroy(int $id): void
    {
        $model = $this->model->findOrFail($id);
        $model->deleteOrFail($id);
    }

    public function firstOrCreate(array $attributes, array $data): Model
    {
        return $this->model->query()->firstOrCreate($attributes, $data);
    }

    public function updateOrCreate(array $attributes, array $data): Model
    {
        return $this->model
            ->query()
            ->updateOrCreate($attributes, $data);
    }
}
