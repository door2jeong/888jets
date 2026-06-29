<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home/index', [
            'title'    => '888Jets — Premium Private Jet Charter',
            'metaDesc' => 'Experience the pinnacle of luxury air travel with 888Jets. Charter a private jet to anywhere in the world with our 24/7 concierge service.',
        ]);
    }
}
