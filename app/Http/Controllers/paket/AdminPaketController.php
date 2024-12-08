<?php

namespace App\Http\Controllers\paket;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class AdminPaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all();

        return view('admin.paket.admin-paket',compact('paket'));
    }
    public function store(Request $request)
    {
        $rules = [
            ''
        ]
    }
}