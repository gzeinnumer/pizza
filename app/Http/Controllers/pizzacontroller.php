<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pizza;
use App\Models\v_laporan;

class pizzacontroller extends Controller
{
    public function index()
    {
        $data = v_laporan::get();
        return view('mod_pizza.index', ['no' =>1, 'data' => $data]);
    }
}
