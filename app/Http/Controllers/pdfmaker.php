<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Master\angsuranModel;
use App\Master\kreditModel;
use App\Master\mobilModel;
use Illuminate\Http\Request;
use App\Master\transaksiModel;
use App\Master\pesananModel;
use App\Master\tentorModel;

class pdfmaker extends Controller
{
    //
    public function adminCetakKredit(Request $request)
    {

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->dataAdminKredit($request));
        return $pdf->stream();
    }

    public function dataAdminKredit(Request $request)
    {
        $daritanggal = $request->daritanggal;
        $ketanggal = $request->ketanggal;

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
            ->whereBetween('tb_kredit.tanggal', [$daritanggal, $ketanggal])
            ->get();

        $contoh = $kredit->first();

        if ($contoh != null) {
            return view('admin.laporan.pdfAdminKredit')->with([
                'kredit' => $kredit,
                'daritanggal' => $daritanggal,
                'ketanggal' => $ketanggal
            ]);
        } else {
            return view('admin.laporan.pdfKosong')->with('kosong', 'Data Transaksi Kosong/ Tidak ada');
        }
    }

    public function adminCetakAngsuran(Request $request)
    {

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->dataAdminAngsuran($request));
        return $pdf->stream();
    }

    public function dataAdminAngsuran(Request $request)
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
            return view('admin.laporan.pdfAdminAngsuran')->with([
                'angsuran' => $angsuran,
                'daritanggal' => $daritanggal,
                'ketanggal' => $ketanggal
            ]);
        } else {
            return view('admin.laporan.pdfKosong')->with('kosong', 'Data Transaksi Kosong/ Tidak ada');
        }
    }
}
