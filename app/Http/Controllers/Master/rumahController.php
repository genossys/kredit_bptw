<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\rumahModel;
use Validator, Redirect, Response, File;

class rumahController extends Controller
{
    //umum =================================================================================================================

    public function menu()
    {
        return view('umum.produk');
    }


    public function showcaseRumah(Request $request)
    {
        $caridata = $request->caridata;
        $rumah = rumahModel::all();

        $contoh = $rumah->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.showcaseRumah')->with('rumah', $rumah)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Rumah akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }












    //Admin =================================================================================================================
    public function index()
    {
        return view('admin.master.datarumah');
    }

    public function showRumah(Request $request)
    {
        $caridata = $request->caridata;
        $rumah = rumahModel::where('namaRumah', 'LIKE', '%' . $caridata . '%')
            ->orwhere('deskripsi', 'LIKE', '%' . $caridata . '%')
            ->orwhere('lokasi', 'LIKE', '%' . $caridata . '%')
            ->get();

        $contoh = $rumah->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.tabelRumah')->with('rumah', $rumah)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Rumah akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function showEditRumah(Request $request)
    {
        $caridata = $request->idRumah;
        $rumah = rumahModel::where('idRumah', 'LIKE', '%' . $caridata . '%')
            ->get();

        $contoh = $rumah->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.modalEditRumah')->with('rumah', $contoh)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Rumah akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function showDetailRumah(Request $request)
    {
        $idRumah = $request->idRumah;
        $rumah = rumahModel::where('idRUmah', $idRumah)->first();


        if ($rumah != null) {
            $returnHTML = view('isidata.modalDetailRumah')->with('rumah', $rumah)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Rumah akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function showKreditRumah(Request $request)
    {
        $idRumah = $request->idRumah;
        $rumah = rumahModel::where('idRUmah', $idRumah)->first();


        if ($rumah != null) {
            $returnHTML = view('isidata.modalKreditRumah')->with('rumah', $rumah)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Rumah akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function insertRumah(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'required|file|max:10048'
            ]
        );

        if ($validator->passes()) {
            $file = $request->file('file');
            $new_name = $request->mitra . $request->nomorMoaMitra . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('foto'), $new_name);
        } else {
            $new_name = '';
        }

        $rumah = new rumahModel();
        $rumah->idRumah = $request->idRumah;
        $rumah->namaRumah = $request->namaRumah;
        $rumah->hargaJual = $request->hargaJual;
        $rumah->lokasi = $request->lokasi;
        $rumah->deskripsi = $request->deskripsi;
        $rumah->urlFoto = $new_name;
        $rumah->save();
    }


    public function editRumah(Request $request)
    {
        if ($request->file != '') {
            $validator = Validator::make(
                $request->all(),
                [
                    'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
                ]
            );

            if ($validator->passes()) {
                $file = $request->file('file');
                $new_name = $request->mitra . $request->nomorMoaMitra . rand(1, 1000) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('foto'), $new_name);
            } else {
                $new_name = '';
            }
        }
        $rumah = rumahModel::find($request->idRumah);
        $rumah->idRumah = $request->idRumah;
        $rumah->namaRumah = $request->namaRumah;
        $rumah->hargaJual = $request->hargaJual;
        $rumah->lokasi = $request->lokasi;
        $rumah->deskripsi = $request->deskripsi;
        if ($request->file != '') {
            $rumah->urlFoto = $new_name;
        }
        $rumah->save();
    }

    public function deleteData(Request $request)
    {
        $rumah = rumahModel::find($request->idRumah);
        $rumah->delete();
    }
}
