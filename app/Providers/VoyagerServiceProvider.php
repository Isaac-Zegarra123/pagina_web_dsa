<?php

namespace App\Providers;

use App\Widgets\ConvocatoriasDimmer;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

class VoyagerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Voyager::addWidget(ConvocatoriasDimmer::class);
        Voyager::addWidget(CircularDimmer::class);
        Voyager::addWidget(ResolucionesDimmer::class);
        // Registra otros widgets aquí
    }
}
