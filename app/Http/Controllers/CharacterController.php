<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CharacterController extends Controller
{
    // Lista de personagens
    public function characters()
    {
        $characters = [
            // Dados mockados (substitua por dados reais depois)
            [
                'name' => 'Gon Freecss',
                'nen_type' => 'Enhancement',
                'image' => 'https://imgur.com/Hf9BoOy'
            ],
            [
                'name' => 'Killua Zoldyck',
                'nen_type' => 'Transmutation',
                'image' => 'https://imgur.com/pQ7Oqhb'
            ]
        ];

        return view('characters', compact('characters'));
    }
}
