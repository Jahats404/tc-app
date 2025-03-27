<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    public function index(){
        $paket = Paket::take(3)->get();
        return view ('landing.packages.index', compact('paket'));
    }
}
