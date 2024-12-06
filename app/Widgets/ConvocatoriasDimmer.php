<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Models\Convocatoria;
use TCG\Voyager\Facades\Voyager;

class ConvocatoriasDimmer extends AbstractWidget
{
    /**
     * La configuración predeterminada del widget.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Ejecuta el widget y devuelve el contenido a mostrar en el dashboard.
     *
     * @return string
     */
    public function run()
    {
        $count = Convocatoria::count(); // Contador de registros en la tabla
        $string = 'Convocatorias';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news', // Cambia el ícono si deseas
            'title'  => "{$count} {$string}",
            'text'   => "Tienes {$count} convocatorias en tu base de datos.",
            'button' => [
                'text' => 'Ver todas las convocatorias',
                'link' => route('voyager.convocatorias.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determina si el widget debe mostrarse en el dashboard.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return true;
    }
}
