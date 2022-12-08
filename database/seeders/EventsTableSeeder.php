<?php

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = \App\Models\User::findOrFail(1);

        Event::truncate();
        $event = new Event();
        $event->title = 'Prueba';
        $event->start = '2020-02-27T06:00:00.000Z';
        $event->color = json_encode([
            'primary' => '#EC1212',
        ]);
        $event->resizable = json_encode([
            'beforeStart' => true,
            'afterEnd' => true,
        ]);
        $event->salon = 'Aranjuez';
        $event->cliente = 'El alex Mejia';
        $event->gte_de_gpos = 'Enrique Mendoza III';
        $event->pax = 'pax';
        $event->montaje = 'montaje';
        $event->notas = 'notas';
        $event->equipment = 150;
        $event->operation = 200;
        $event->entertainment = 150;
        $event->subtotal = 500;
        $event->final = 0;
        $event->flete = json_encode([
            'beforeStart' => true,
            'afterEnd' => true,
        ]);
        $event->iva = 80;
        $event->total = 580;
        $event->coordinacion = json_encode([
            [
                'name' => 'coordinacion',
                'cost' => 1000,
                'checked' => false,
                'quantity' => 1,
                'subtotal' => 1000
            ],
            [
                'name' => 'coordinacion',
                'cost' => 1000,
                'checked' => false,
                'quantity' => 1,
                'subtotal' => 1000
            ],
            [
                'name' => 'coordinacion',
                'cost' => 1000,
                'checked' => false,
                'quantity' => 1,
                'subtotal' => 1000
            ]
        ]);
        $event->ctoOperacion = 5450;
        $event->entretenimiento = json_encode([
            'beforeStart' => true,
            'afterEnd' => true,
        ]);
        $event->finalDlrs = 706;
        $event->group = '3 B';
        $event->hotel = 'hotel';
        $event->ivaDlrs = 112.12;
        $event->ivaFinal =  751.154;
        $event->mn = 13414;
        $event->products = json_encode([
            'beforeStart' => true,
            'afterEnd' => true,
        ]);
        $event->proveedores = json_encode([
            'beforeStart' => true,
            'afterEnd' => true,
        ]);
        $event->subEntretainment = 15.15;
        $event->subEquipment = 15.15;
        $event->subOperacion = 15.15;
        $event->subTotalDlrs = 15.15;
        $event->subtotalFinal = 15.15;
        $event->totalDlrs = 15.15;
        $event->totalIvaFinal = 15.15;
        $event->utilidad = 15.15;
        $event->workforce = json_encode([
            'beforeStart' => true,
            'afterEnd' => true,
        ]);

        $event->user()->associate($user);
        $event->save();

        // Event::create([
        //     'title' => 'Prueba',
        //     'start' => "2020-02-27T06:00:00.000Z",
        //     'color' => json_encode([
        //         'primary' => '#EC1212',
        //     ]),
        //     'resizable' => json_encode([
        //         'beforeStart' => true,
        //         'afterEnd' => true,
        //     ]),
        //     'salon' => 'Aranjuez',
        //     'grupo' => '3 B',
        //     'cliente' => 'El alex Mejia',
        //     'gte_de_gpos' => 'Enrique Mendoza III',
        //     'pax' => 'pax',
        //     'montaje' => 'montaje',
        //     'notas' => 'notas',
        //     'equipment' => 150,
        //     'operation' => 200,
        //     'entertainment' => 150,
        //     'subtotal' => 500,
        //     'final' => 0,
        //     'flete' => json_encode([
        //         'beforeStart' => true,
        //         'afterEnd' => true,
        //     ]),
        //     'iva' => 80,
        //     'total' => 580,
        //     'coordinacion' => json_encode([
        //         [
        //             'name' => 'coordinacion',
        //             'cost' => 1000,
        //             'checked' => false,
        //             'quantity' => 1,
        //             'subtotal' => 1000
        //         ],
        //         [
        //             'name' => 'coordinacion',
        //             'cost' => 1000,
        //             'checked' => false,
        //             'quantity' => 1,
        //             'subtotal' => 1000
        //         ],
        //         [
        //             'name' => 'coordinacion',
        //             'cost' => 1000,
        //             'checked' => false,
        //             'quantity' => 1,
        //             'subtotal' => 1000
        //         ]
        //     ]),
        //     'ctoOperacion' => 5450,
        //     'entretenimiento' => json_encode([
        //         'beforeStart' => true,
        //         'afterEnd' => true,
        //     ]),
        //     'finalDlrs' => 706,
        //     'group' => '3 B',
        //     'hotel' => "Hotel",
        //     'ivaDlrs' => 112.12,
        //     'ivaFinal' => 751.154,
        //     'mn' => 13414,
        //     'products' => json_encode([
        //         'beforeStart' => true,
        //         'afterEnd' => true,
        //     ]),
        //     'proveedores' => json_encode([
        //         'beforeStart' => true,
        //         'afterEnd' => true,
        //     ]),
        //     'subEntretainment' => 15.15,
        //     'subEquipment' => 15.15,
        //     'subOperacion' => 15.15,
        //     'subTotalDlrs' => 15.15,
        //     'subtotalFinal' => 15.15, 
        //     'totalDlrs' => 15.15,
        //     'totalIvaFinal' => 15.15, 
        //     'utilidad' => 15.15,
        //     'workforce' => json_encode([
        //         'beforeStart' => true,
        //         'afterEnd' => true,
        //     ]),
        // ]);
    }
}
