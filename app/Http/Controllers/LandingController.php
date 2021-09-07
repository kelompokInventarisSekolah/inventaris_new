<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Barang;
use App\Models\Ruangan;
use App\Models\Peminjam;

class LandingController extends Controller
{
    public function index(){
        
        $barang = Barang::all();
        $pembeli = Peminjam::all();
        // $barang_id = Barang::where('id_barang',$id)->get();
        $ruangan = Ruangan::all();

        return view('main',['barang'=>$barang , 'pembeli'=>$pembeli],compact('ruangan', 'barang' , 'pembeli'));
    }
    
    public function tambah_peminjam(Request $request)
    {
        // dd($request);
        Peminjam ::create([
            'nama_peminjam' => $request['nama_peminjam'],
            'ruangan_id' => $request['ruangan_id'],
            'barang_id' => $request['barang_id'],
            'tujuan_peminjam' => $request['tujuan_peminjam'],
            'qty' => $request['qty']
        ]);
        return redirect()->route('nampil');
    }
    public function generate ($id)
    {
        $barang = Barang::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($barang->lokasi);
        return view('qrcode',compact('qrcode'));
    }

    public function qrPeminjam ($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        $qrcode = QrCode::size(400)->generate($peminjam->nama_peminjam);
        return view('qrcode',compact('qrcode'));
    }
}