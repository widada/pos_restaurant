<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promo;

class PromoAController extends Controller
{
    public function index()
    {       
        $data = Promo::all();

        return view('PromoA.index', [
            'items' => $data
        ]);
    }
}
