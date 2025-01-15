<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class PdfReportButton extends AbstractAction
{
    public function getTitle()
    {
        return 'Reporte PDF';
    }

    public function getIcon()
    {
        return 'voyager-document';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-primary',
            'target' => '_blank',
        ];
    }

    public function getDefaultRoute()
    {
        return route('reporte.pdf', ['slug' => $this->dataType->slug]);
    }

    public function shouldActionDisplayOnDataType()
    {
        // Mostrar la acción solo en las tablas que especificaste
        return in_array($this->dataType->slug, [
            'convocatorias', 'circulares', 'dictamenes', 'resoluciones', 'diseño-curricular',
        ]);
    }
}
