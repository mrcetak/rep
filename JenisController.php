<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;
use Session;
use PDF;

class JenisController extends Controller
{
    //
    public function tampil()
    {
    	$jenis = Jenis::all();
    	return view('inventaris.jenis')->with([
    		'datajenis' => $jenis,
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
    			'nama_jenis' => 'required',
                'kode_jenis' => 'required',
                'keterangan' => 'required',
    		]);
    	$simpan = new Jenis();
    	$simpan->nama_jenis = $request->nama_jenis;
    	$simpan->kode_jenis = $request->kode_jenis;
    	$simpan->keterangan = $request->keterangan;
    	$simpan->save();

    	Session::flash('pesan', 'Berhasil Disimpan');
    	return redirect()->route('jenis.tampil');
    }

    public function hapus($id)
    {
    	$hapus = Jenis::find($id);
    	$hapus->delete();

    	Session::flash('pesan', 'Berhasil Dihapus');
    	return redirect()->route('jenis.tampil');
    }

    public function edit($id)
    {
    	$data = Jenis::find($id);
    	return view('inventaris.editjenis')->with([
    		'data' => $data,
    		]);
    }

    public function editproses(Request $request)
    {
    	$this->validate($request,
    		[
    			'nama_jenis' => 'required',
                'kode_jenis' => 'required',
                'keterangan' => 'required',
    		]);
    	$simpan = Jenis::find($request->id);
    	$simpan->nama_jenis = $request->nama_jenis;
    	$simpan->kode_jenis = $request->kode_jenis;
    	$simpan->keterangan = $request->keterangan;
    	$simpan->save();

    	Session::flash('pesan', 'Berhasil Diubah');
    	return redirect()->route('jenis.tampil');
    }

    public function cetak()
    {
    	$jenis = Jenis::all();
    	return view('cetak.cetakjenis')->with([
    		'datajenis' => $jenis,
    		]);

    	/*$data = 
    	[
    		'datajenis' => $jenis,
    	];
    	$pdf = PDF::loadView('cetak.cetakjenis', $data);
    	return $pdf->stream('data_jenis.pdf');*/
    }

}
