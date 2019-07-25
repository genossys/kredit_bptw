<?php

namespace App\Http\Controllers\Master;

use App\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    //

    //menampilkan halaman user
    public function index()
    {
        return view('admin.master.datauser');
    }

    public function showUser(Request $request)
    {
        $caridata = $request->caridata;
        $user = User::where('email', 'LIKE', '%' . $caridata . '%')
            ->orwhere('nama', 'LIKE', '%' . $caridata . '%')
            ->orwhere('hakAkses', 'LIKE', '%' . $caridata . '%')
            ->get();

        $contoh = $user->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.tabelUser')->with('user', $user)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data User akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function insertUser(Request $r)
    {
        # code...

        try {
            $member = new User();
            $member->nama = $r->nama;
            $member->email = $r->email;
            $member->password = Hash::make($r->password);
            $member->hakAkses = "admin";
            $member->save();
        } catch (\Throwable $th) {
            return 'Error Program ' . $th;
        }
    }
}
