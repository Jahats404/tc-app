<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function index(){
        return view('admin.foto.index');
    }
}
