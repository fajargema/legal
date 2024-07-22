<?php

namespace App\Exports;

use App\Models\Legal;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ReportsExport implements WithMultipleSheets
{
    private $start_date, $end_date, $residence;

    public function __construct($start_date, $end_date, $residence)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->residence = $residence;
    }

    public function sheets(): array
    {
        $sheets = [];

        $legals = $this->getAllReport($this->start_date, $this->end_date, $this->residence);

        $sheets[] = new ReportsSheet($legals);

        return $sheets;
    }

    public function getAllReport($start_date, $end_date, $residence): Collection
    {
        $reports = collect([]);
        if ($residence == 'all') {
            $legals = Legal::with('user', 'residence')->whereBetween('created_at', [$start_date, $end_date])->get();
        } else {
            $legals = Legal::with('user', 'residence')->where('residence_id', $residence)->whereBetween('created_at', [$start_date, $end_date])->get();
        }

        $no = 1;
        foreach ($legals as $legal) {
            $kartu_konsumen = $legal->kartu_konsumen ? 'Sudah' : 'Belum';
            $mpp = $legal->mpp ? 'Sudah' : 'Belum';
            $fpa = $legal->fpa ? 'Sudah' : 'Belum';
            $sp3k = $legal->sp3k ? 'Sudah' : 'Belum';
            $data_diri = $legal->data_diri ? 'Sudah' : 'Belum';
            $pk = $legal->pk ? 'Sudah' : 'Belum';
            $sertifikat = $legal->sertifikat ? 'Sudah' : 'Belum';
            $spr = $legal->spr ? 'Sudah' : 'Belum';
            $bphtb = $legal->bphtb ? 'Sudah' : 'Belum';
            $ajb = $legal->ajb ? 'Sudah' : 'Belum';

            $reports->push([
                'no' => $no++,
                'perumahan' => $legal->residence->name,
                'name' => $legal->name,
                'category' => $legal->category,
                'kartu_konsumen' => $kartu_konsumen,
                'mpp' => $mpp,
                'fpa' => $fpa,
                'sp3k' => $sp3k,
                'data_diri' => $data_diri,
                'pk' => $pk,
                'sertifikat' => $sertifikat,
                'spr' => $spr,
                'bphtb' => $bphtb,
                'ajb' => $ajb,
                'created_at' => Date::dateTimeToExcel($legal->created_at),
            ]);
        }

        return $reports;
    }
}
