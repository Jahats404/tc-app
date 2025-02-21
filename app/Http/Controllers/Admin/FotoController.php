<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function index(){
        // $foto = Foto::where('status_foto','Editing')->get();
        $foto = Foto::orderBy('antrian','asc')->get();
        $antrianFoto = Foto::where('status_foto', 'Editing')->orderBy('antrian','desc')->first();
        
        return view('admin.foto.index',compact('foto','antrianFoto'));
    }

    public function update(Request $request,$id)
    {
        $validateData = $request->validate(
            $rules = [
                'status_foto' =>'required|in:Sending,Listing,Editing,Complete',
                'link' => 'required',
            ],
            $messages = [
                'status_foto.required' => 'Status Foto wajib diisi',
                'status_foto.in' => 'Status Foto tidak valid',
                'link.required' => 'Link Foto wajib diisi',
            ],
        );

        $foto = Foto::find($id);
        $foto->status_foto = $request->status_foto;
        $foto->link = $request->link;
        $foto->save();

        return redirect()->back()->with('success','Foto berhasil diperbarui');
    }

    public function delete($id)
    {
        $foto = Foto::find($id);
        $foto->delete();

        return redirect()->back()->with('success','Foto berhasil dihapus');
    }
    
}