<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\HargaPaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index(){
        
        $hargaPaket = HargaPaket::all();
        $booking = Booking::all();

        
        return view('admin.booking.index',compact('hargaPaket','booking'));
    }

    public function store(Request $request)
    {
    
        $validator = Validator::make($request->all(), Booking::$rules, Booking::$messages);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $b = new Booking();
        $b->id_booking = 'BOOK' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $b->nama = $request->nama;
        $b->email = $request->email;
        $b->no_wa = $request->no_wa;
        $b->event = $request->event;
        $b->tanggal = $request->tanggal;
        $b->jam = $request->jam;
        $b->universitas = $request->universitas;
        $b->fakultas = $request->fakultas;
        $b->lokasi_foto = $request->lokasi_foto;
        $b->ig_vendor = $request->ig_vendor;
        $b->ig_client = $request->ig_client;
        $b->post_foto = $request->post_foto;
        $b->jumlah_anggota = $request->jumlah_anggota;
        $b->req_khusus = $request->req_khusus;
        $b->status_booking = $request->status_booking;
        $b->user_id = Auth::user()->id;
        $b->harga_paket_id = $request->harga_paket_id;
        $b->save();

        return redirect()->back()->with('success','Booking berhasil ditambahkan');
    }

    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), Booking::$rules, Booking::$messages);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $b = Booking::find($id);
        $b->nama = $request->nama;
        $b->email = $request->email;
        $b->no_wa = $request->no_wa;
        $b->event = $request->event;
        $b->tanggal = $request->tanggal;
        $b->jam = $request->jam;
        $b->universitas = $request->universitas;
        $b->fakultas = $request->fakultas;
        $b->lokasi_foto = $request->lokasi_foto;
        $b->ig_vendor = $request->ig_vendor;
        $b->ig_client = $request->ig_client;
        $b->post_foto = $request->post_foto;
        $b->jumlah_anggota = $request->jumlah_anggota;
        $b->req_khusus = $request->req_khusus;
        $b->status_booking = $request->status_booking;
        $b->user_id = Auth::user()->id;
        $b->harga_paket_id = $request->harga_paket_id;
        $b->save();

        return redirect()->back()->with('success','Booking berhasil diperbarui');
    }

    public function delete($id)
    {
        $b = Booking::find($id);
        $b->delete();

        return redirect()->back()->with('success','Booking berhasil dihapus');
    }
}