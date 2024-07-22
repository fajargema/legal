<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ReportsSheet implements FromCollection, WithHeadings, WithTitle, WithColumnFormatting
{
    private Collection $reports;

    public function __construct(Collection $reports)
    {
        $this->reports = $reports;
    }

    public function headings(): array
    {
        return [
            'No.',
            'Perumahan',
            'Nama',
            'Pekerjaan',
            'Kartu Konsumen',
            'Memo Persetujuan Penjualan',
            'Form Pengajuan Akad',
            'Surat Penegasan Persetujuan Penyediaan Kredit',
            'Data Diri',
            'Pernyataan Kredit',
            'Sertifikat',
            'Surat Pernyataan Rumah',
            'Bukti Pembayaran BPHTB',
            'Akta Jual Beli',
            'Terakhir Diupdate'
        ];
    }

    public function collection()
    {
        return $this->reports;
    }

    public function title(): string
    {
        return 'Reports';
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER,
            'B' => DataType::TYPE_STRING,
            'C' => DataType::TYPE_STRING,
            'D' => DataType::TYPE_STRING,
            'E' => DataType::TYPE_STRING,
            'F' => DataType::TYPE_STRING,
            'G' => DataType::TYPE_STRING,
            'H' => DataType::TYPE_STRING,
            'I' => DataType::TYPE_STRING,
            'J' => DataType::TYPE_STRING,
            'K' => DataType::TYPE_STRING,
            'L' => DataType::TYPE_STRING,
            'M' => DataType::TYPE_STRING,
            'N' => DataType::TYPE_STRING,
            'O' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
