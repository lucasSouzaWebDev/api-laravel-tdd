<?php

namespace App\Services;

use App\Repositories\Contracts\AbstractRepositoryInterface;

abstract class AbstractService
{
    protected $entityRepository;

    public function __construct(AbstractRepositoryInterface $resourceRepository)
    {
        $this->entityRepository = $resourceRepository;
    }

    public function getAll()
    {
        return $this->entityRepository->getAll();
    }

    public function find(int $id)
    {
        return $this->entityRepository->find($id);
    }

    public function create(array $data)
    {
        // apply business rules.

        return $this->entityRepository->create($data);
    }

    public function update(int $id, array $categorie)
    {
        // apply business rules.

        $entity = $this->entityRepository->find($id);

        if (!$entity) {
            return response()->json(['message' => 'Register Not Found.'], 404);
        }

        $this->entityRepository->update($entity, $categorie);
        return response()->json([], 204);
    }

    public function destroy(int $id)
    {
        // apply business rules.

        $entity = $this->entityRepository->find($id);
        if (!$entity) {
            return response()->json(['message' => 'Register Not Found.'], 404);
        }

        $this->entityRepository->destroy($entity);
        return response()->json(['message' => 'Register Deleted.'], 204);
    }
}