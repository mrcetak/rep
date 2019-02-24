<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruang;
use Session;
use PDF;

class RuangController extends Controller
{
    //
    public function tampil()
    {
    	$ruang = Ruang::all();
    	return view('inventaris.ruang')->with([
    		'dataruang' => $ruang,
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
    			'nama_ruang' => 'required',
    			'kode_ruang' => 'required',
    			'keterangan' => 'required',
    		]);
    	$simpan = new Ruang();
    	$simpan->nama_ruang = $request->nama_ruang;
    	$simpan->kode_ruang = $request->kode_ruang;
    	$simpan->keterangan = $request->keterangan;
    	$simpan->save();

    	Session::flash('pesan', 'Berhasil Disimpan');
    	return redirect()->route('ruang.tampil');
    }

    public function hapus($id)
    {
    	$hapus = Ruang::find($id);
    	$hapus->delete();

    	Session::flash('pesan', 'Berhasil Dihapus');
    	return redirect()->route('ruang.tampil');
    }

    public function edit($id)
    {
    	$data = Ruang::find($id);
    	return view('inventaris.editruang')->with([
    		'data' => $data,
    		]);
    }

    public function editproses(Request $request)
    {
    	$this->validate($request,
    		[
    			'nama_ruang' => 'required',
    			'kode_ruang' => 'required',
    			'keterangan' => 'required',
    		]);
    	$simpan = Ruang::find($request->id);
    	$simpan->nama_ruang = $request->nama_ruang;
    	$simpan->kode_ruang = $request->kode_ruang;
    	$simpan->keterangan = $request->keterangan;
    	$simpan->save();

    	Session::flash('pesan', 'Berhasil Diubah');
    	return redirect()->route('ruang.tampil');
    }

    public function cetak()
    {
    	$ruang = Ruang::all();
    	return view('cetak.cetakruang')->with([
    		'dataruang' => $ruang,
    		]);

    	/*$data = 
    	[
    		'dataruang' => $ruang,
    	];
    	$pdf = PDF::loadView('cetak.cetakruang', $data);
    	return $pdf->stream('data_ruang.pdf');*/
    }

}
