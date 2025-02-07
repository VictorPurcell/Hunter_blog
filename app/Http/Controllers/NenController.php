<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NenController extends Controller
{
    public function nen()
    {
        $nenTypes = [
            'Enhancement' => [
                'color' => '#FF6B6B',
                'masters' => ['Gon Freecss', 'Uvogin'],
                'description' => 'Fortalecimento das habilidades naturais'
            ],
            'Transmutation' => [
                'color' => '#4ECDC4',
                'masters' => ['Killua Zoldyck', 'Hisoka'],
                'description' => 'Alteração das propriedades da aura'
            ],
            'Conjuration' => [
                'color' => '#45B7D1',
                'masters' => ['Kurapika', 'Kite'],
                'description' => 'Materialização de objetos físicos'
            ]
        ];

        $nenAbilities = [
            [
                'name' => 'Jajanken',
                'type' => 'Enhancement',
                'user' => 'Gon Freecss'
            ],
            [
                'name' => 'Godspeed',
                'type' => 'Transmutation',
                'user' => 'Killua Zoldyck'
            ]
        ];

        return view('nen', compact('nenTypes', 'nenAbilities'));
    }
}
