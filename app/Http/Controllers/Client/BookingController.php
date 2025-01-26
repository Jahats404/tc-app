<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\BookingPaketTambahan;
use App\Models\HargaPaket;
use App\Models\PaketTambahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $booking = Booking::where('user_id',Auth::user()->id)->get();
        $hargaPaket = HargaPaket::orderBy('paket_id')->get();
        $paketTambahan = PaketTambahan::all();
        
        return view('client.booking.index',compact('booking','hargaPaket','paketTambahan'));
    }

    public function update(Request $request,$id)
    {
        $rules = Booking::$rules = ['status_booking' => 'nullable'];
        $validator = Validator::make($request->all(), $rules, Booking::$messages);
    
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
        // $b->status_booking = $request->status_booking;
        // $b->user_id = Auth::user()->id;
        $b->harga_paket_id = $request->harga_paket_id;
        $b->dp = $request->dp;

        
        // Update paket tambahan jika ada
        if ($request->has('paket_tambahan')) {
            // Hapus semua data pivot terkait
            $b->paketTambahan()->detach();
        
            // Tambahkan kembali data dengan ID kustom
            foreach ($request->paket_tambahan as $paketTambahanId) {
                $b->paketTambahan()->attach($paketTambahanId, [
                    'id_booking_paket_tambahan' => 'BPT' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT),
                ]);
            }
        }

        // if ($request->has('paket_tambahan')) {
            
        //     if () {
        //         # code...
        //     }
        //     foreach ($request->paket_tambahan as $pt) {
        //         $bookingPaketTambahan = BookingPaketTambahan::create([
        //             'booking_id' => $b->id_booking,
        //             'paket_tambahan_id' => $pt,
        //         ]);
        //     }
        // }
        
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

    public function ubah_status(Request $request,$id)
    {
        $b = Booking::find($id);
        $b->status_booking = $request->status_booking;
        $b->save();

        return redirect()->back()->with('success','Booking berhasil di Cancel');
    }
}