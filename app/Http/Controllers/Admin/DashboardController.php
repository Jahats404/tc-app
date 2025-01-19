<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view ('admin.dashboard.index');
    }

    public function landing()
    {
        $paket = Paket::all();
        $wilayah1 = Wilayah::where('kode','W1')->get();
        $wilayah2 = Wilayah::where('kode','W2')->get();
        // dd($paket->kategori_paket);
        return view('landing.landing',compact('paket','wilayah1','wilayah2'));
    }
}