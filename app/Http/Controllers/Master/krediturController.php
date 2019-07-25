<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\krediturModel;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class krediturController extends Controller
{
    //

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    { }

    public function index()
    {
        return view('admin.master.datakreditur');
    }

    public function showFormRegistrasi()
    {
        $this->middleware('guest');
        return view('auth.registermember');
    }

    private function isValid(Request $r)
    {
        $messages = [
            'required'  => 'Field :attribute Tidak Boleh Kosong',
            'max'       => 'Filed :attribute Maksimal :max',
        ];

        $rules = [
            'email' => 'required|max:191',
            'nohp' => 'required|numeric|digits_between:1,15',
        ];

        return Validator::make($r->all(), $rules, $messages);
    }

    public function register(Request $r)
    {
        $this->middleware('guest');
        $this->isValid($r)->validate();

        $validator = Validator::make(
            $r->all(),
            [
                'urlFoto' => 'required|file|max:2048'
            ]
        );

        if ($validator->passes()) {
            $urlFoto = $r->file('urlFoto');
            $new_name = $r->nik . rand() . '.' . $urlFoto->getClientOriginalExtension();
            $urlFoto->move(public_path('foto'), $new_name);
        } else {
            $new_name = '';
        }

        # code...
        try {
            $kreditur = new krediturModel();
            $kreditur->nik = $r->nik;
            $kreditur->email = $r->email;
            $kreditur->nama = $r->nama;
            $kreditur->password = Hash::make($r->password);
            $kreditur->nohp = $r->nohp;
            $kreditur->alamat = $r->alamat;
            $kreditur->tgl_lahir = $r->tgl_lahir;
            $kreditur->urlFoto = $new_name;
            $kreditur->save();
            $credentials = $r->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect()->intended('/');
            } else {
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            return 'Error Program ' . $th;
        }
    }

    public function delete(Request $r)
    {
        $id = $r->input('id');
        krediturModel::query()
            ->where('username', '=', $id)
            ->delete();;
        return response()->json([
            'sukses' => 'Berhasil Di hapus' . $id,
            'sqlResponse' => true,
        ]);
    }

    public function showKreditur(Request $request)
    {
        $caridata = $request->caridata;
        $kreditur = krediturModel::where('nik', 'LIKE', '%' . $caridata . '%')
            ->orwhere('nama', 'LIKE', '%' . $caridata . '%')
            ->orwhere('email', 'LIKE', '%' . $caridata . '%')
            ->orwhere('alamat', 'LIKE', '%' . $caridata . '%')
            ->orwhere('nohp', 'LIKE', '%' . $caridata . '%')
            ->get();

        $contoh = $kreditur->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.tabelKreditur')->with('kreditur', $kreditur)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Kreditur akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }


    public function showEditKreditur(Request $request)
    {
        $caridata = $request->id;
        $kreditur = krediturModel::where('id', 'LIKE', '%' . $caridata . '%')
            ->get();

        $contoh = $kreditur->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.modalEditKreditur')->with('kreditur', $contoh)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Kreditur akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function showDetailKreditur(Request $request)
    {
        $caridata = $request->id;
        $kreditur = krediturModel::where('id', 'LIKE', '%' . $caridata . '%')
            ->get();

        $contoh = $kreditur->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.modalDetailKreditur')->with('kreditur', $contoh)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Kreditur akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }


    public function editKreditur(Request $request)
    {
        if ($request->urlFoto != '') {
            $validator = Validator::make(
                $request->all(),
                [
                    'file' => 'required|file|max:2048'
                ]
            );

            if ($validator->passes()) {
                $file = $request->file('urlFoto');
                $new_name = $request->idKreditur . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('urlFoto'), $new_name);
            } else {
                $new_name = '';
            }
        }
        $kreditur = krediturModel::find($request->idKreditur);
        $kreditur->idKreditur = $request->idKreditur;
        $kreditur->namaKreditur = $request->namaKreditur;
        $kreditur->hargaJual = $request->hargaJual;
        $kreditur->lokasi = $request->lokasi;
        $kreditur->deskripsi = $request->deskripsi;
        if ($request->urlFoto != '') {
            $kreditur->urlFoto = $new_name;
        }
        $kreditur->save();
    }

    public function deleteData(Request $request)
    {
        $kreditur = krediturModel::find($request->id);
        $kreditur->delete();
    }
}
