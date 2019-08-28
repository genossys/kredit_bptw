<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Master\angsuranModel;
use App\Master\bankModel;
use App\Master\kreditModel;
use DateTimeImmutable;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class angsuranController extends Controller
{
    //

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    { }

    public function index()
    {
        return view('bank.transaksi.dataangsuran');
    }

    public function laporanAngsuran()
    {
        return view('admin.laporan.laporanangsuran');
    }

    public function laporanAngsuranbank()
    {
        return view('bank.laporan.laporanangsuran');
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



    public function showKredit(Request $request)
    {
        $bank = bankModel::where('email', auth()->user()->email)->first();

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
            ->where('tb_kredit.status', 'diterima')
            ->where(function ($q) use ($caridata) {
                $q->where('tb_bank.nama', 'LIKE', '%' . $caridata . '%')
                    ->orwhere('tb_kredit.noKontrak', 'LIKE', '%' . $caridata . '%')
                    ->orwhere('tb_rumah.namaRumah', 'LIKE', '%' . $caridata . '%')
                    ->orwhere('tb_kreditur.nama', 'LIKE', '%' . $caridata . '%');
            })
            ->get();


        $contoh = $kredit->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.tabelKreditBank')->with('kredit', $kredit)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Angsuran akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function showAngsuran(Request $request)
    {
        $noKontrak = $request->noKontrak;
        $angsuran = angsuranModel::join('tb_kredit', 'tb_angsuran.noKontrak', 'tb_kredit.noKontrak')
            ->join('tb_kreditur', 'tb_angsuran.idKreditur', 'tb_kreditur.id')
            ->where('tb_kredit.noKontrak', $noKontrak)
            ->orderby('jatuhTempo', 'asc')
            ->get();
        $contoh = $angsuran->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.tabelAngsuranBank')->with('angsuran', $angsuran)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Angsuran akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }


    public function showBankLaporanAngsuran(Request $request)
    {
        $daritanggal = $request->daritanggal;
        $ketanggal = $request->ketanggal;
        $bank = bankModel::where('email', auth()->user()->email)->first();
        $idBank = $bank->id;

        $angsuran = angsuranModel::join('tb_kredit', 'tb_angsuran.noKontrak', 'tb_kredit.noKontrak')
            ->join('tb_kreditur', 'tb_angsuran.idKreditur', 'tb_kreditur.id')
            ->join('tb_bank', 'tb_kredit.idBank', 'tb_bank.id')
            ->whereBetween('tb_angsuran.tanggalPembayaran', [$daritanggal, $ketanggal])
            ->where('tb_bank.id', $idBank)
            ->orderby('jatuhTempo', 'asc')
            ->get();
        $contoh = $angsuran->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.tabelAdminLaporanAngsuran')->with('angsuran', $angsuran)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Angsuran akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function showAdminLaporanAngsuran(Request $request)
    {
        $daritanggal = $request->daritanggal;
        $ketanggal = $request->ketanggal;
        $angsuran = angsuranModel::join('tb_kredit', 'tb_angsuran.noKontrak', 'tb_kredit.noKontrak')
            ->join('tb_kreditur', 'tb_angsuran.idKreditur', 'tb_kreditur.id')
            ->whereBetween('tb_angsuran.tanggalPembayaran', [$daritanggal, $ketanggal])
            ->orderby('jatuhTempo', 'asc')
            ->get();
        $contoh = $angsuran->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.tabelAdminLaporanAngsuran')->with('angsuran', $angsuran)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Angsuran akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function showAngsuranKreditur(Request $request)
    {
        $noKontrak = $request->noKontrak;
        $angsuran = angsuranModel::join('tb_kredit', 'tb_angsuran.noKontrak', 'tb_kredit.noKontrak')
            ->join('tb_kreditur', 'tb_angsuran.idKreditur', 'tb_kreditur.id')
            ->where('tb_kredit.noKontrak', $noKontrak)
            ->orderby('jatuhTempo', 'asc')
            ->get();
        $contoh = $angsuran->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.tabelAngsuranKreditur')->with('angsuran', $angsuran)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Angsuran akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }


    public function bayarAngsuran(Request $request)
    {
        try {
            $angsuran = angsuranModel::find($request->idAngsuran);
            $angsuran->statusBayar = 'sudah';
            $angsuran->tanggalPembayaran = date('Y-m-d');
            $angsuran->namaPetugas = auth()->user()->nama;
            $angsuran->save();
        } catch (\Throwable $th) {
            return 'Error Program ' . $th;
        }
    }

    public function showEditAngsuran(Request $request)
    {
        $caridata = $request->id;
        $angsuran = angsuranModel::where('id', $caridata)
            ->get();

        $contoh = $angsuran->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.modalEditAngsuran')->with('angsuran', $contoh)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Angsuran akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function showDetailAngsuran(Request $request)
    {
        $caridata = $request->id;
        $angsuran = angsuranModel::where('id', 'LIKE', '%' . $caridata . '%')
            ->get();

        $contoh = $angsuran->first();

        if ($contoh != null) {
            $returnHTML = view('isidata.modalDetailAngsuran')->with('angsuran', $contoh)->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        } else {
            $returnHTML = view('isidata.datakosong')->with('kosong', 'Data Angsuran akan Tampil di sini ')->render();
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }


    public function editAngsuran(Request $request)
    {

        $angsuran = angsuranModel::find($request->id);
        $angsuran->status = $request->status;
        if ($angsuran->status == 'diterima') {
            $angsuran2 = angsuranModel::where('noKontrak', $request->noKontrak)
                ->first();

            $kaliPertemuan = $angsuran2->top;
            $tanggal = new DateTimeImmutable(date('Y-m-d'));

            $i = 0;
            while ($kaliPertemuan > $i) {
                $angsuran = new angsuranModel();
                $angsuran->tanggal = $tanggal;
                $angsuran->noKontrak = $request->noKontrak;
                $angsuran->idAngsuranur = $request->idAngsuranur;
                $angsuran->save();

                $tanggal = $tanggal->modify('+1 month');
                $i++;
            }
        }
        $angsuran->save();
    }

    public function createAngsuran(Request $r)
    { }

    public function deleteData(Request $request)
    {
        $angsuran = angsuranModel::find($request->id);
        $angsuran->delete();
    }
}
