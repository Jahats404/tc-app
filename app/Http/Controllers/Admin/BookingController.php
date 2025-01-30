<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\HargaPaket;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

        $cekUser = User::where('email',$request->email)->first();
        $b = new Booking();

        if (!$cekUser) {
            $user = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->email),
                'role_id' => '2',
            ]);
            $b->user_id = $user->id;
        } 
        else {
            $b->user_id = $cekUser->id;
        }

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
        // $b->user_id = Auth::user()->id;
        $b->harga_paket_id = $request->harga_paket_id;
        $b->save();

        return redirect()->back()->with('success','Booking berhasil ditambahkan');
    }

    public function update(Request $request,$id)
    {
        $rules = Booking::$rules = ['status_booking' => 'nullable'];
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
        $b->jam_selesai = $request->jam_selesai;
        $b->universitas = $request->universitas;
        $b->fakultas = $request->fakultas;
        $b->lokasi_foto = $request->lokasi_foto;
        $b->ig_vendor = $request->ig_vendor;
        $b->ig_client = $request->ig_client;
        $b->post_foto = $request->post_foto;
        $b->jumlah_anggota = $request->jumlah_anggota;
        $b->req_khusus = $request->req_khusus;
        // $b->status_booking = $request->status_booking;
        // $b->user_id = Auth::user()->id;
        $b->harga_paket_id = $request->harga_paket_id;

        // Cek jika file ada di request
        if ($request->hasFile('file_dp')) {
            $file = $request->file('file_dp');

            // Hapus file lama jika ada
            if ($b->file_dp) {
                // Menghapus file lama dari storage
                Storage::disk('public')->delete($b->file_dp);
            }

            $path = 'uploads/dp';

            // Simpan file baru
            $b->file_dp = $file->store($path, 'public');
        }
        $b->save();

        return redirect()->back()->with('success','Booking berhasil diperbarui');
    }

    public function delete($id)
    {
        $b = Booking::find($id);
        // Hapus file lama jika ada
        if ($b->file_dp) {
            // Menghapus file lama dari storage
            Storage::disk('public')->delete($b->file_dp);
        }
        $b->delete();

        return redirect()->back()->with('success','Booking berhasil dihapus');
    }

    public function ubah_status(Request $request, $id)
    {
        $cekPesanan = Pesanan::where('booking_id',$id)->first();
        $booking = Booking::find($id);

        if (!$cekPesanan && $request->status_booking == 'Accepted') {
            $booking->status_booking = $request->status_booking;
            $booking->save();
            
            $pesanan = new Pesanan();
            $pesanan->id_pesanan = 'PSN' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
            $pesanan->booking_id = $booking->id_booking;
            $pesanan->faktur = 'TC' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
            $pesanan->save();
            
        }
        else {
            $booking->status_booking = $request->status_booking;
            $booking->save();
        }
        
        return redirect()->back()->with('success','Status Booking berhasil diubah');
    }
}