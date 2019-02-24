<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;
use App\Inventaris;
use App\Pegawai;
use Session;
use PDF;

class PeminjamanController extends Controller
{
    //
    public function tampil()
    {
    	$peminjaman = Peminjaman::all();
    	$datainven = Inventaris::all();
    	$datapegawai = Pegawai::all();
    	return view('peminjaman.peminjaman')->with([
    		'datapeminjaman' => $peminjaman,
    		'datainven' => $datainven,
    		'datapegawai' => $datapegawai,
    		]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function simpan(Request $request)
    {
    	$this->validate($request,
    		[
    			'inventaris_id' => 'required',
    			'tanggal_pinjam' => 'required',
    			'tanggal_kembali' => 'required',
                'jumlah' => 'required',
                'status_peminjaman' => 'required',
                'pegawai_id' => 'required',
    		]);
    	$simpan = new Peminjaman();
    	$simpan->inventaris_id = $request->inventaris_id;
    	$simpan->tanggal_pinjam = $request->tanggal_pinjam;
    	$simpan->tanggal_kembali = $request->tanggal_kembali;
    	$simpan->jumlah = $request->jumlah;
    	$simpan->status_peminjaman = $request->status_peminjaman;
    	$simpan->pegawai_id = $request->pegawai_id;
    	$simpan->save();

    	Session::flash('pesan', 'Berhasil Disimpan');
    	return redirect()->route('peminjaman.tampil');
    }

    public function hapus($id)
    {
    	$hapus = Peminjaman::find($id);
    	$hapus->delete();

    	Session::flash('pesan', 'Berhasil Dihapus');
    	return redirect()->route('peminjaman.tampil');
    }

    public function edit($id)
    {
    	$data = Peminjaman::find($id);
    	$datainven = Inventaris::all();
    	$datapegawai = Pegawai::all();
    	return view('peminjaman.editpeminjaman')->with([
    		'data' => $data,
    		'datainven' => $datainven,
    		'datapegawai' => $datapegawai,
    		]);
    }

    public function editproses(Request $request)
    {
    	$this->validate($request,
    		[
    			'inventaris_id' => 'required',
    			'tanggal_pinjam' => 'required',
    			'tanggal_kembali' => 'required',
                'jumlah' => 'required',
                'status_peminjaman' => 'required',
                'pegawai_id' => 'required',
    		]);
    	$simpan = Peminjaman::find($request->id);
    	$simpan->inventaris_id = $request->inventaris_id;
    	$simpan->tanggal_pinjam = $request->tanggal_pinjam;
    	$simpan->tanggal_kembali = $request->tanggal_kembali;
    	$simpan->jumlah = $request->jumlah;
    	$simpan->status_peminjaman = $request->status_peminjaman;
    	$simpan->pegawai_id = $request->pegawai_id;
    	$simpan->save();

    	Session::flash('pesan', 'Berhasil Diubah');
    	return redirect()->route('peminjaman.tampil');
    }

    public function cetak()
    {
    	$peminjaman = Peminjaman::all();
    	return view('cetak.cetakpeminjaman')->with([
    		'datapeminjaman' => $peminjaman,
    		]);

    	/*$data = 
    	[
    		'datapeminjaman' => $peminjaman,
    	];
    	$pdf = PDF::loadView('cetak.cetakpeminjaman', $data);
    	return $pdf->stream('data_peminjaman.pdf');*/
    }
}
