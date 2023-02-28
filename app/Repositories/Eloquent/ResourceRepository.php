<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\ResourceRepositoryInterface;
use App\Models\Resource;
use Illuminate\Support\Facades\Cache;

class ResourceRepository extends AbstractRepository implements ResourceRepositoryInterface
{
    public function __construct(Resource $resource)
    {

        parent::__construct($resource);
    }
}