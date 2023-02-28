<?php

namespace App\Http\Controllers\Api;

use App\Services\ResourceService;
use App\Http\Requests\StoreUpdateResource;
use App\Http\Resources\ResourceResource;

class ResourceController extends AbstractController
{
    protected $resourceService;

    public function __construct(ResourceService $resourceService)
    {
        parent::__construct($resourceService);
        $this->resourceService = $resourceService;
    }

    public function store(StoreUpdateResource $request)
    {
        $category = $this->resourceService->create($request->all());
        return new ResourceResource($category);
    }

    public function update(StoreUpdateResource $request, $id)
    {
        $category = $this->resourceService->update($id, $request->all());
        return $category;
    }
}
