<?php

namespace App\Repositories\Contracts;

interface AbstractRepositoryInterface
{
    public function getAll();

    public function find(int $id);

    public function create(array $data);

    public function update(object $entity, array $data);

    public function destroy(object $entity);
}