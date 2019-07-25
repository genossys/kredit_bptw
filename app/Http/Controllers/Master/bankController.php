<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\bankModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class bankController extends Controller
{
    //

    //menampilkan halaman bank
    public function index()
    {
        return view('admin.master.databank');
    }

    public function showBank(Request $request)
    {
        $caridata = $request->caridata;
        $bank = bankModel::where('nama', 'LIKE', '%' . $caridata . '%')
            ->orwhere('alamat', 'LIKE', '%' . $caridata . '%')
            ->orwhere('email', 'LIKE', '%' . $caridata . '%')
            ->get();

        $contoh = $bank->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.tabelBank')->with('bank', $bank)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Bank akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function showEditBank(Request $request)
    {
        $caridata = $request->idBank;
        $bank = bankModel::where('id', 'LIKE', '%' . $caridata . '%')
            ->get();

        $contoh = $bank->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.modalEditBank')->with('bank', $contoh)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Bank akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }


    public function insertBank(Request $request)
    {
        $bank = new bankModel();
        $bank->email = $request->email;
        $bank->password = Hash::make($request->password);
        $bank->alamat = $request->alamat;
        $bank->contact = $request->contact;
        $bank->nohp = $request->nohp;
        $bank->nama = $request->nama;
        $bank->save();
    }


    public function editBank(Request $request)
    {

        $bank = bankModel::find($request->id);
        $bank->email = $request->email;
        $bank->alamat = $request->alamat;
        $bank->contact = $request->contact;
        $bank->nohp = $request->nohp;
        $bank->nama = $request->nama;
        $bank->save();
    }

    public function deleteData(Request $request)
    {
        $bank = bankModel::find($request->id);
        $bank->delete();
    }
}
