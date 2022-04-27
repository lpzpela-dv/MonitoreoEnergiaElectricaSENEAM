<?php

namespace App\Providers;

use App\Models\Aeropuerto;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {

        Event::listen(BuildingMenu::class, function (BuildingMenu $event) {
            if (isset($_COOKIE['id_aero_selected'])) {
                $aeroID = $_COOKIE['id_aero_selected'];
                // Obtener el nombre de las areas y mostrar el menú
                $areas = DB::table('areas_st')->select('id', 'aeropuerto_id', 'areaName')->where('aeropuerto_id', $aeroID)->get();
                // dd($areas[0]->id);
                foreach ($areas as $area) {
                    // dd($area->areaName);
                    $event->menu->addIn('Areas', [
                        'key' => $area->areaName,
                        'text' => $area->areaName,
                        'icon' => 'fa-solid fa-location-dot',
                        'url' => 'areas/' . $area->id,
                    ]);
                }

                //Obter nombre de aeropuerto y crear el boton
                $aero = Aeropuerto::all('id', 'shortName', 'description')->where('id', $aeroID);
                foreach ($aero as $values) {
                    $event->menu->add([
                        'text' => $values->description,
                        'key' => 'aeroname',
                        'icon' => 'fa-solid fa-plane-arrival',
                    ]);
                    $event->menu->addIn('aeroname', [
                        'key' => 'cambiar',
                        'text' => 'Cambar Aeropuerto',
                        'icon' => 'fa-solid fa-arrows-rotate',
                        'url' => '#',
                        'id' => 'changeAero',
                    ]);
                }
            }
        });
    }
}
