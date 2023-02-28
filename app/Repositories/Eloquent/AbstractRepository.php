<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\AbstractRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class AbstractRepository implements AbstractRepositoryInterface
{
    private $entity;

    private const TTL = 60 * 60 * 24;

    public function __construct(Model $entity)
    {
        $this->entity = $entity;
    }

    public function getAll()
    {
        return Cache::remember('resources', self::TTL, function () {
            return $this->entity::paginate(); 
        });
    }

    public function find(int $id)
    {
        return $this->entity::findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->entity->create($data);
    }

    public function update(object $entity, array $data)
    {
        return $entity->update($data);
    }

    public function destroy(object $entity)
    {
        return $entity->delete();
    }
}