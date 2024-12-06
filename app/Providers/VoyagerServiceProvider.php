<?php

namespace App\Providers;

use App\Actions\PdfReportButton;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;
use App\Widgets\ConvocatoriasDimmer;

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
