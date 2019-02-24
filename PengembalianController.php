<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengembalian;
use App\Peminjaman;
use App\Pegawai;
use Session;
use PDF;

class PengembalianController extends Controller
{
    //
    public function tampil()
    {
    	$pengembalian = Pengembalian::all();
    	$datapeminjaman = Peminjaman::all();
    	$datapegawai = Pegawai::all();
    	return view('pengembalian.pengembalian')->with([
    		'datapengembalian' => $pengembalian,
    		'datapeminjaman' => $datapeminjaman,
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
    			'peminjaman_id' => 'required',
    			'tanggal_kembali' => 'required',
    			'jumlah' => 'required',
                'status_pengembalian' => 'required',
                'pegawai_id' => 'required',
    		]);
    	$simpan = new Pengembalian();
    	$simpan->peminjaman_id = $request->peminjaman_id;
    	$simpan->tanggal_kembali = $request->tanggal_kembali;
    	$simpan->jumlah = $request->jumlah;
    	$simpan->status_pengembalian = $request->status_pengembalian;
    	$simpan->pegawai_id = $request->pegawai_id;
    	$simpan->save();

    	Session::flash('pesan', 'Berhasil Disimpan');
    	return redirect()->route('pengembalian.tampil');
    }

    public function hapus($id)
    {
    	$hapus = Pengembalian::find($id);
    	$hapus->delete();

    	Session::flash('pesan', 'Berhasil Dihapus');
    	return redirect()->route('pengembalian.tampil');
    }

    public function edit($id)
    {
    	$data = Pengembalian::find($id);
    	$datapeminjaman = Peminjaman::all();
    	$datapegawai = Pegawai::all();
    	return view('pengembalian.editpengembalian')->with([
    		'data' => $data,
    		'datapeminjaman' => $datapeminjaman,
    		'datapegawai' => $datapegawai,
    		]);
    }

    public function editproses(Request $request)
    {
    	$this->validate($request,
    		[
    			'peminjaman_id' => 'required',
    			'tanggal_kembali' => 'required',
    			'jumlah' => 'required',
                'status_pengembalian' => 'required',
                'pegawai_id' => 'required',
    		]);
    	$simpan = Pengembalian::find($request->id);
    	$simpan->peminjaman_id = $request->peminjaman_id;
    	$simpan->tanggal_kembali = $request->tanggal_kembali;
    	$simpan->jumlah = $request->jumlah;
    	$simpan->status_pengembalian = $request->status_pengembalian;
    	$simpan->pegawai_id = $request->pegawai_id;
    	$simpan->save();

    	Session::flash('pesan', 'Berhasil Diubah');
    	return redirect()->route('pengembalian.tampil');
    }

    public function cetak()
    {
    	$pengembalian = Pengembalian::all();
    	/*return view('cetak.cetakpengembalian')->with([
    		'datapengembalian' => $inven,
    		]);*/

    	$data = 
    	[
    		'datapengembalian' => $pengembalian,
    	];
    	$pdf = PDF::loadView('cetak.cetakpengembalian', $data);
    	return $pdf->stream('data_pengembalian.pdf');
    }
}
