<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\angsuranModel;
use App\Master\kreditModel;
use App\Master\krediturModel;
use DateTimeImmutable;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class kreditController extends Controller
{
    //

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    { }

    public function index()
    {
        return view('admin.transaksi.datakredit');
    }

    public function historyTransaksi()
    {
        $email = auth()->user()->email;
        $kreditur = krediturModel::where('email', $email)->first();

        $kredit = kreditModel::where('idKreditur', $kreditur->id)
            ->get();

        return view('kreditur.dataTransaksi')->with('kredit', $kredit);
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

    public function insertKredit(Request $r)
    {
        $email = auth()->user()->email;
        $kreditur = krediturModel::where('email', $email)->first();

        try {
            $kredit = new kreditModel();
            $kredit->noKontrak = "1234";
            $kredit->idKreditur = $kreditur->id;
            $kredit->idRumah = $r->idRumah;
            $kredit->idBank = $r->idBank;
            $kredit->tanggal = date('Y-m-d');
            $kredit->dp = $r->dp;
            $kredit->angsuran = $r->angsuran;
            $kredit->top = $r->top;
            $kredit->status = "proses";
            $kredit->save();
        } catch (\Throwable $th) {
            return 'Error Program ' . $th;
        }
    }

    public function delete(Request $r)
    {
        $id = $r->input('id');
        kreditModel::query()
            ->where('username', '=', $id)
            ->delete();;
        return response()->json([
            'sukses' => 'Berhasil Di hapus' . $id,
            'sqlResponse' => true,
        ]);
    }

    public function showKredit(Request $request)
    {
        $caridata = $request->caridata;
        $kredit = kreditModel::select(
            'tb_bank.nama as namaBank',
            'tb_rumah.namaRumah as namaRumah',
            'tb_kreditur.nama as namaKreditur',
            'tb_kredit.noKontrak as noKontrak',
            'tb_kredit.tanggal as tanggal',
            'tb_kredit.dp as dp',
            'tb_kredit.id as id',
            'tb_kredit.angsuran as angsuran',
            'tb_kredit.top as top',
            'tb_kredit.status as status'
        )
            ->join('tb_bank', 'tb_kredit.idBank', 'tb_bank.id')
            ->join('tb_rumah', 'tb_kredit.idRumah', 'tb_rumah.idRumah')
            ->join('tb_kreditur', 'tb_kredit.idKreditur', 'tb_kreditur.id')
            ->where('tb_bank.nama', 'LIKE', '%' . $caridata . '%')
            ->where('tb_rumah.namaRumah', 'LIKE', '%' . $caridata . '%')
            ->where('tb_kreditur.nama', 'LIKE', '%' . $caridata . '%')
            ->get();

        $contoh = $kredit->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.tabelKredit')->with('kredit', $kredit)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Kredit akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }


    public function showEditKredit(Request $request)
    {
        $caridata = $request->id;
        $kredit = kreditModel::where('id', $caridata)
            ->get();

        $contoh = $kredit->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.modalEditKredit')->with('kredit', $contoh)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Kredit akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function showDetailKredit(Request $request)
    {
        $caridata = $request->id;
        $kredit = kreditModel::where('id', 'LIKE', '%' . $caridata . '%')
            ->get();

        $contoh = $kredit->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.modalDetailKredit')->with('kredit', $contoh)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Kredit akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }


    public function editKredit(Request $request)
    {

        $kredit = kreditModel::find($request->id);
        $kredit->status = $request->status;
        if ($kredit->status == 'diterima') {
            $kredit2 = kreditModel::where('noKontrak', $request->noKontrak)
                ->first();

            $kaliPertemuan = $kredit2->top;
            $tanggal = new DateTimeImmutable(date('Y-m-d'));

            $i = 0;
            while ($kaliPertemuan > $i) {
                $angsuran = new angsuranModel();
                $angsuran->jatuhTempo = $tanggal;
                $angsuran->noKontrak = $request->noKontrak;
                $angsuran->idKreditur = $request->idKreditur;
                $angsuran->save();

                $tanggal = $tanggal->modify('+1 month');
                $i++;
            }
        }
        $kredit->save();
    }

    public function createAngsuran(Request $r)
    { }

    public function deleteData(Request $request)
    {
        $kredit = kreditModel::find($request->id);
        $kredit->delete();
    }
}
