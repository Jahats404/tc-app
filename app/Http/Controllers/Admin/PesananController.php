<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Foto;
use App\Models\Fotografer;
use App\Models\Pesanan;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index(){

        $pesanan = Pesanan::all();
        $fotografer = Fotografer::all();
        
        return view('admin.pesanan.index',compact('pesanan','fotografer'));
    }

    public function update(Request $request,$id)
    {
        $rules = [
            'tanggal' => 'required|date',
            'negara' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'universitas' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'jam' => 'required',
            // 'kategori_paket' => 'required|string|max:255',
            'fotografer' => 'nullable|string|max:255',
            'fakultas' => 'nullable|string|max:255',
            'lokasi_foto' => 'nullable|string|max:255',
            'post_foto' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'status_foto' => 'required|in:Pending,Edited,Complete',
            'harga' => 'required|numeric|min:1',
            'dp' => 'required|numeric|min:1',
            'kekurangan' => 'nullable|numeric|min:0',
            'pelunasan' => 'nullable|numeric|min:0',
            'total' => 'nullable|numeric|min:1',
            'freelance' => 'nullable|numeric|min:1',
            'no_wa' => 'required|string|regex:/^[0-9]+$/|min:10|max:15',
        ];

        $messages = [
            'tanggal.required' => 'Tanggal wajib diisi.',
            'tanggal.date' => 'Tanggal tidak valid.',
            'negara.required' => 'Negara wajib diisi.',
            'negara.string' => 'Negara harus berupa teks.',
            'kota.required' => 'Kota wajib diisi.',
            'kota.string' => 'Kota harus berupa teks.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'jam.required' => 'Jam wajib diisi.',
            // 'jam.date_format' => 'Format jam tidak valid. Gunakan format HH:mm.',
            'kategori_paket.required' => 'Kategori paket wajib diisi.',
            'status_foto.required' => 'Status foto wajib diisi.',
            'status_foto.in' => 'Status foto harus salah satu dari Pending, Edited, atau Complete.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga minimal adalah 1.',
            'dp.required' => 'DP wajib diisi.',
            'dp.numeric' => 'DP harus berupa angka.',
            'dp.min' => 'DP minimal adalah 1.',
            'no_wa.required' => 'Nomor WhatsApp wajib diisi.',
            'no_wa.string' => 'Nomor WhatsApp harus berupa teks.',
            'no_wa.regex' => 'Nomor WhatsApp hanya boleh berisi angka.',
            'no_wa.min' => 'Nomor WhatsApp minimal 10 digit.',
            'no_wa.max' => 'Nomor WhatsApp maksimal 15 digit.',
        ];

        $validateData = $request->validate($rules,$messages);

        $pesanan = Pesanan::find($id);
        $booking = Booking::find($pesanan->booking_id);

        $booking->tanggal = $request->tanggal;
        $booking->negara = $request->negara;
        $booking->kota = $request->kota;
        $booking->universitas = $request->universitas;
        $booking->nama = $request->nama;
        $booking->jam = $request->jam;
        $booking->fakultas = $request->fakultas;
        $booking->lokasi_foto = $request->lokasi_foto;
        $booking->post_foto = $request->post_foto;
        $booking->dp = $request->dp;
        // $booking->file_dp = $request->file_dp;
        $booking->no_wa = $request->no_wa;
        $booking->save();


        $pesanan->fotografer_id = $request->fotografer_id;
        $pesanan->kekurangan = $request->kekurangan;
        $pesanan->pelunasan = $request->pelunasan;
        $pesanan->total = $request->total;
        $pesanan->freelance = $request->freelance;
        $pesanan->keterangan = $request->keterangan;
        $pesanan->status_pembayaran = $request->status_pembayaran;
        $pesanan->save();

        $foto = Foto::where('pesanan_id',$pesanan->id_pesanan)->first();
        if (!$foto) {
            $foto = new Foto();
            $foto->id_foto = 'FT' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
            $foto->status_foto = $request->status_foto;
            $foto->link = $request->link;
            $foto->pesanan_id = $pesanan->id_pesanan;
            $foto->save();
        } 
        else {
            $foto->status_foto = $request->status_foto;
            $foto->link = $request->link;
            $foto->save();
        }

        return redirect()->back()->with('success','Berhasil diperbarui');
        
    }
}