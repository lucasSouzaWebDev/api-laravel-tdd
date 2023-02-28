<?php

namespace App\Services;

use App\Repositories\Contracts\ResourceRepositoryInterface;

class ResourceService extends AbstractService
{
    public function __construct(ResourceRepositoryInterface $resourceRepository)
    {
        parent::__construct($resourceRepository);
    }
}