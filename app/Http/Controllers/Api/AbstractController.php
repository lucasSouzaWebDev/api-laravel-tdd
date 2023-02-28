<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ResourceResource;
use App\Http\Controllers\Controller;
use App\Services\AbstractService;

class AbstractController extends Controller
{
    protected $abstractService;

    public function __construct(AbstractService $abstractService)
    {
        $this->abstractService = $abstractService;
    }

    public function index()
    {
        $categories = $this->abstractService->getAll();
        return ResourceResource::collection($categories);
    }

    public function show($id)
    {
        $category = $this->abstractService->find($id);
        return new ResourceResource($category);
    }

    public function destroy($id)
    {
        $category = $this->abstractService->destroy($id);
        return $category;
    }
}
