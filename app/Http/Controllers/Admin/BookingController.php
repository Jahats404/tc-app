<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Foto;
use App\Models\HargaPaket;
use App\Models\PaketTambahan;
use App\Models\Pesanan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index(){
        
        // THIS IS OLD CODE
        // $hargaPaket = HargaPaket::whereHas('paket', function ($query) {
        //     $query->orderBy('nama_paket','asc');
        // })->get();
        $paketTambahan = PaketTambahan::all();
        
        $hargaPaket = HargaPaket::join('paket', 'harga_paket.paket_id', '=', 'paket.id_paket')
            ->join('kategori_paket', 'paket.kp_id', '=', 'kategori_paket.id_kp')
            ->orderBy('kategori_paket.nama_kategori', 'asc')
            ->select('harga_paket.*') // Ambil seig_mua kolom dari harga_paket
            ->get();

        $booking = Booking::orderByDesc('created_at')->get();


        $pesanan = Pesanan::whereHas('booking', function ($query) {
            $query->where('status_booking','Accepted');
        })->get();

        foreach ($pesanan as $pes) {
            $jumlahHargaTambahan = $pes->harga_paket_tambahan;
        
            // foreach ($pes->booking->paketTambahan as $pt) {
            //     $jumlahHargaTambahan += $pt->harga_tambahan;
            // }
        
            $total = $pes->booking->dp + $pes->pelunasan;
            $kekurangan = ($pes->booking->harga_paket->harga + $jumlahHargaTambahan) - $total;
        
            // Update pesanan dengan nilai yang telah dihitung
            $pes->update([
                'harga_paket_tambahan' => $jumlahHargaTambahan,
                'kekurangan' => $kekurangan,
                'total' => $total
            ]);
        }

        
        return view('admin.booking.index',compact('hargaPaket','booking','paketTambahan'));
    }

    public function store(Request $request)
    {
        $rules = Booking::$rules = [
            'kota' => 'required',
        ];
        
        $validator = Validator::make($request->all(), $rules, Booking::$messages);
        

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
        $b->kota = $request->kota;
        $b->ig_mua = $request->ig_mua;
        $b->ig_dress = $request->ig_dress;
        $b->ig_nailart = $request->ig_nailart;
        $b->ig_hijab = $request->ig_hijab;
        $b->ig_client = $request->ig_client;
        $b->post_foto = $request->post_foto;
        $b->jumlah_anggota = $request->jumlah_anggota;
        $b->req_khusus = $request->req_khusus;
        $b->status_booking = 'Pending';
        // $b->user_id = Auth::user()->id;
        $b->harga_paket_id = $request->harga_paket_id;

        $idBooking = $b->id_booking;
        
        $b->save();

        // code untuk paket tambahan
        $book = Booking::find($idBooking);
        // Update paket tambahan jika ada
        if ($request->has('paket_tambahan')) {
            // Hapus semua data pivot terkait
            $book->paketTambahan()->detach();
        
            // Tambahkan kembali data dengan ID kustom
            foreach ($request->paket_tambahan as $paketTambahanId) {
                $book->paketTambahan()->attach($paketTambahanId, [
                    'id_booking_paket_tambahan' => 'BPT' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT),
                ]);
            }
        }
        $book->save();

        return redirect()->back()->with('success','Booking berhasil ditambahkan');
    }

    public function update(Request $request,$id)
    {
        $request->merge(['dp' => str_replace('.', '', $request->dp)]);

        $rules = Booking::$rules = [
            'kota' => 'required',
        ];
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
        $b->kota = $request->kota;
        $b->jam_selesai = $request->jam_selesai;
        $b->universitas = $request->universitas;
        $b->fakultas = $request->fakultas;
        $b->lokasi_foto = $request->lokasi_foto;
        $b->ig_mua = $request->ig_mua;
        $b->ig_dress = $request->ig_dress;
        $b->ig_nailart = $request->ig_nailart;
        $b->ig_hijab = $request->ig_hijab;
        $b->ig_client = $request->ig_client;
        $b->post_foto = $request->post_foto;
        $b->jumlah_anggota = $request->jumlah_anggota;
        $b->req_khusus = $request->req_khusus;
        // $b->status_booking = $request->status_booking;
        // $b->user_id = Auth::user()->id;
        $b->harga_paket_id = $request->harga_paket_id;

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
        
        $b->save();

        return redirect()->back()->with('success','Booking berhasil diperbarui');
    }

    public function updateDp(Request $request, $id)
{
    $request->merge(['dp' => str_replace('.', '', $request->dp)]);

    $rules = [
        'dp' => 'required|numeric',
        'file_dp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $b = Booking::findOrFail($id);

    // Cek apakah nilai dp berubah atau masih null
    if ($b->dp != $request->dp || $b->dp == null) {
        $b->tanggal_dp = Carbon::now()->toDate();
    }

    $b->dp = $request->dp;

    // Cek jika file ada di request
    if ($request->hasFile('file_dp')) {
        $file = $request->file('file_dp');

        // Hapus file lama jika ada
        if ($b->file_dp) {
            Storage::disk('public')->delete($b->file_dp);
        }

        $path = 'uploads/dp';

        // Simpan file baru
        $b->file_dp = $file->store($path, 'public');
    }

    $b->save();

    return redirect()->back()->with('success', 'DP berhasil diperbarui');
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
        
        if ($booking && $booking->status_booking == 'Accepted') {
            if ($request->status_booking == 'Rejected') {
                return redirect()->back()->with('warning','Booking yang sudah diterima tidak bisa Ditolak/Reject!');
            }
        }
        if (!$cekPesanan && $request->status_booking == 'Accepted') {
            $booking->status_booking = $request->status_booking;
            $booking->save();
            
            $pesanan = new Pesanan();
            $pesanan->id_pesanan = 'PSN' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
            $pesanan->booking_id = $booking->id_booking;
            $pesanan->faktur = 'TC' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
            // $pesanan->save();
            
            // INSERT FOTO JIKA BELUM ADA DAN BUAT ANTRIAN
            $foto = Foto::where('pesanan_id',$pesanan->id_pesanan)->first();
            $antrianFoto = Foto::orderBy('antrian', 'desc')->first();
            // $antrianFoto = Foto::where('status_foto', 'Editing')->orderBy('antrian','desc')->first();
            if ($antrianFoto) {
                $antrianFoto = $antrianFoto->antrian;
            } else {
                $antrianFoto = Foto::count();
            }
            
            if (!$foto) {
                $foto = new Foto();
                $foto->id_foto = 'FT' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
                $foto->status_foto = $request->status_foto;
                $foto->link = $request->link;
                $foto->pesanan_id = $pesanan->id_pesanan;
                $foto->antrian = $antrianFoto + 1;
                // $foto->save();
            } 
            else {
                $foto->status_foto = $request->status_foto;
                $foto->link = $request->link;
                // $foto->save();
            }
            $pesanan->save();
            $foto->save();
            
        }
        else {
            $booking->status_booking = $request->status_booking;
            $booking->save();
        }
        
        return redirect()->back()->with('success','Status Booking berhasil diubah');
    }
}