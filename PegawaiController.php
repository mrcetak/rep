<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Session;
use PDF;

class PegawaiController extends Controller
{
    //
    public function tampil()
    {
    	$pegawai = Pegawai::all();
    	return view('pegawai.pegawai')->with([
    		'datapegawai' => $pegawai,
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
    			'nama_pegawai' => 'required',
    			'nip' => 'required',
    			'alamat' => 'required',
    		]);
    	$simpan = new Pegawai();
    	$simpan->nama_pegawai = $request->nama_pegawai;
    	$simpan->nip = $request->nip;
    	$simpan->alamat = $request->alamat;
    	$simpan->save();

    	Session::flash('pesan', 'Berhasil Disimpan');
    	return redirect()->route('pegawai.tampil');
    }

    public function hapus($id)
    {
    	$hapus = Pegawai::find($id);
    	$hapus->delete();

    	Session::flash('pesan', 'Berhasil Dihapus');
    	return redirect()->route('pegawai.tampil');
    }

    public function edit($id)
    {
    	$data = Pegawai::find($id);
    	return view('pegawai.editpegawai')->with([
    		'data' => $data,
    		]);
    }

    public function editproses(Request $request)
    {
    	$this->validate($request,
    		[
    			'nama_pegawai' => 'required',
    			'nip' => 'required',
    			'alamat' => 'required',
    		]);
    	$simpan = Pegawai::find($request->id);
    	$simpan->nama_pegawai = $request->nama_pegawai;
    	$simpan->nip = $request->nip;
    	$simpan->alamat = $request->alamat;
    	$simpan->save();

    	Session::flash('pesan', 'Berhasil Diubah');
    	return redirect()->route('pegawai.tampil');
    }

    public function cetak()
    {
    	$pegawai = Pegawai::all();
    	return view('cetak.cetakpegawai')->with([
    		'datapegawai' => $pegawai,
    		]);

    	/*$data = 
    	[
    		'datapegawai' => $pegawai,
    	];
    	$pdf = PDF::loadView('cetak.cetakpegawai', $data);
    	return $pdf->stream('data_pegawai.pdf');*/
    }
}
