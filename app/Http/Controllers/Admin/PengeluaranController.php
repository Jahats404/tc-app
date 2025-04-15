<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisPengeluaran;
use App\Models\Pengeluaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Svg\Tag\Rect;

class PengeluaranController extends Controller
{
    public function jenisPengeluaran()
    {
        $jenisPengeluaran = JenisPengeluaran::all();

        return view('admin.jenis_pengeluaran.index',compact('jenisPengeluaran'));
    }

    public function storeJenisPengeluaran(Request $request)
    {
        $request->validate(
            [
                'jenis_pengeluaran' => 'required|unique:jenis_pengeluaran,jenis_pengeluaran',
            ],
            [
                'jenis_pengeluaran.required' => 'Jenis Pengeluaran wajib diisi.',
                'jenis_pengeluaran.unique' => 'Jenis Pengeluaran sudah ada.',
            ]
        );

        $jp = JenisPengeluaran::create(['jenis_pengeluaran' => $request->jenis_pengeluaran]);

        return redirect()->back()->with('success','Jenis Pengeluaran berhasil ditambahkan.');

    }

    public function updateJenisPengeluaran(Request $request,$id)
    {
        $request->validate(
            [
                'jenis_pengeluaran' => 'required|unique:jenis_pengeluaran,jenis_pengeluaran',
            ],
            [
                'jenis_pengeluaran.required' => 'Jenis Pengeluaran wajib diisi.',
                'jenis_pengeluaran.unique' => 'Jenis Pengeluaran sudah ada.',
            ]
        );

        $jp = JenisPengeluaran::find($id)->update(['jenis_pengeluaran' => $request->jenis_pengeluaran]);

        return redirect()->back()->with('success','Jenis Pengeluaran berhasil diperbarui.');
    }

    public function deleteJenisPengeluaran($id)
    {
        JenisPengeluaran::find($id)->delete();

        return redirect()->back()->with('success','Jenis Pengeluaran berhasil dihapus');
    }

// ======================================================================

    public function pengeluaran()
    {
        $pengeluaran = Pengeluaran::all();
        $jenisPengeluaran = JenisPengeluaran::all();

        $totalOmsetKotor = Pesanan::where('status_pembayaran', 'Lunas')->sum('total');

        return view('admin.pengeluaran.index',compact(['pengeluaran','jenisPengeluaran','totalOmsetKotor']));
    }

    public function storePengeluaran(Request $request)
    {
        $request->merge(
            [
                    'nominal' => str_replace('.', '', $request->nominal)
                ]
        );

        $request->validate(
            [
                'jenis_pengeluaran_id' => 'required|exists:jenis_pengeluaran,id_jenis_pengeluaran',
                'tanggal_transaksi' => 'required|date',
                'deskripsi' => 'required',
                'nominal' => 'required',
            ],
            [
                'jenis_pengeluaran_id.required' => 'Jenis Pengeluaran wajib diisi.',
                'jenis_pengeluaran_id.exists' => 'Jenis Pengeluaran tidak valid.',
                'tanggal_transaksi.required' => 'Tanggal Transaksi wajib diisi.',
                'tanggal_transaksi.date' => 'Tanggal Transaksi tidak valid.',
                'deskripsi.required' => 'Deskripsi wajib diisi.',
                'nominal.required' => 'Nominal wajib diisi.',
            ]
        );

        $pengeluaran = new Pengeluaran();
        $pengeluaran->tanggal_transaksi = $request->tanggal_transaksi;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->nominal = $request->nominal;
        $pengeluaran->jenis_pengeluaran_id = $request->jenis_pengeluaran_id;
        $pengeluaran->save();

        return redirect()->back()->with('success','Pengeluaran berhasil ditambahkan');
    }

    public function updatePengeluaran(Request $request,$id)
    {
        $request->merge(
            [
                    'nominal' => str_replace('.', '', $request->nominal)
                ]
        );

        $request->validate(
            [
                'jenis_pengeluaran_id' => 'required|exists:jenis_pengeluaran,id_jenis_pengeluaran',
                'tanggal_transaksi' => 'required|date',
                'deskripsi' => 'required',
                'nominal' => 'required',
            ],
            [
                'jenis_pengeluaran_id.required' => 'Jenis Pengeluaran wajib diisi.',
                'jenis_pengeluaran_id.exists' => 'Jenis Pengeluaran tidak valid.',
                'tanggal_transaksi.required' => 'Tanggal Transaksi wajib diisi.',
                'tanggal_transaksi.date' => 'Tanggal Transaksi tidak valid.',
                'deskripsi.required' => 'Deskripsi wajib diisi.',
                'nominal.required' => 'Nominal wajib diisi.',
            ]
        );

        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->tanggal_transaksi = $request->tanggal_transaksi;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->nominal = $request->nominal;
        $pengeluaran->jenis_pengeluaran_id = $request->jenis_pengeluaran_id;
        $pengeluaran->save();

        return redirect()->back()->with('success','Pengeluaran berhasil diperbarui');
    }

    public function deletePengeluaran($id)
    {
        $pengeluaran = Pengeluaran::find($id)->delete();
        return redirect()->back()->with('success','Pengeluaran berhasil dihapus');
    }
}