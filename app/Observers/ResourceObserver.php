<?php

namespace App\Observers;

use App\Models\Resource;
use Illuminate\Support\Facades\Cache;

class ResourceObserver
{
    /**
     * Handle the Resource "created" event.
     *
     * @param  \App\Models\Resource  $resource
     * @return void
     */
    public function created(Resource $resource)
    {
        Cache::forget('resources');
    }
}
