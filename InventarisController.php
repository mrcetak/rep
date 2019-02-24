<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventaris;
use App\Jenis;
use App\Ruang;
use App\User;
use Session;
use PDF;

class InventarisController extends Controller
{
    //
    public function tampil()
    {
    	$inven = Inventaris::all();
    	$datajenis = Jenis::all();
    	$dataruang = Ruang::all();
    	$datauser = User::all();
    	return view('inventaris.inventaris')->with([
    		'datainven' => $inven,
    		'datajenis' => $datajenis,
    		'dataruang' => $dataruang,
    		'datauser' => $datauser,
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
    			'nama' => 'required',
    			'kondisi' => 'required',
    			'keterangan' => 'required',
                'jumlah' => 'required',
                'jenis_id' => 'required',
                'ruang_id' => 'required',
                'kode_inventaris' => 'required',
                'user_id' => 'required',
    		]);
    	$simpan = new Inventaris();
    	$simpan->nama = $request->nama;
    	$simpan->kondisi = $request->kondisi;
    	$simpan->keterangan = $request->keterangan;
    	$simpan->jumlah = $request->jumlah;
    	$simpan->jenis_id = $request->jenis_id;
    	$simpan->ruang_id = $request->ruang_id;
    	$simpan->kode_inventaris = $request->kode_inventaris;
    	$simpan->user_id = $request->user_id;
    	$simpan->save();

    	Session::flash('pesan', 'Berhasil Disimpan');
    	return redirect()->route('inventaris.tampil');
    }

    public function hapus($id)
    {
    	$hapus = Inventaris::find($id);
    	$hapus->delete();

    	Session::flash('pesan', 'Berhasil Dihapus');
    	return redirect()->route('inventaris.tampil');
    }

    public function edit($id)
    {
    	$data = Inventaris::find($id);
    	$datajenis = Jenis::all();
    	$dataruang = Ruang::all();
    	$datauser = User::all();
    	return view('inventaris.editinventaris')->with([
    		'data' => $data,
    		'datajenis' => $datajenis,
    		'dataruang' => $dataruang,
    		'datauser' => $datauser,
    		]);
    }

    public function editproses(Request $request)
    {
    	$this->validate($request,
    		[
    			'nama' => 'required',
                'kondisi' => 'required',
                'keterangan' => 'required',
                'jumlah' => 'required',
                'jenis_id' => 'required',
                'ruang_id' => 'required',
                'kode_inventaris' => 'required',
                'user_id' => 'required',
            ]);
        $simpan = Inventaris::find($request->id);
        $simpan->nama = $request->nama;
        $simpan->kondisi = $request->kondisi;
        $simpan->keterangan = $request->keterangan;
        $simpan->jumlah = $request->jumlah;
        $simpan->jenis_id = $request->jenis_id;
        $simpan->ruang_id = $request->ruang_id;
        $simpan->kode_inventaris = $request->kode_inventaris;
        $simpan->user_id = $request->user_id;
        $simpan->save();

    	Session::flash('pesan', 'Berhasil Diubah');
    	return redirect()->route('inventaris.tampil');
    }

    public function cetak()
    {
    	$inven = Inventaris::all();
    	return view('cetak.cetakinventaris')->with([
    		'datainven' => $inven,
    		]);

    	/*$data = 
    	[
    		'datainven' => $inven,
    	];
    	$pdf = PDF::loadView('cetak.cetakinventaris', $data);
    	return $pdf->stream('data_inventaris.pdf');*/
    }

}
