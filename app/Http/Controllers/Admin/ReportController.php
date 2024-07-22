<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReportsExport;
use App\Http\Controllers\Controller;
use App\Models\Residence;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $residences = Residence::select('id', 'name')->get();
        return view('pages.admin.report.index', compact('residences'));
    }

    public function exportExcel(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)->startOfDay();
        $end_date = Carbon::parse($request->end_date)->endOfDay();
        $residence = $request->residence_id;

        $excel = new ReportsExport($start_date, $end_date, $residence);

        return Excel::download($excel, 'Data Report Dari Tanggal ' . $start_date->format('d M Y') . ' Hingga Tanggal ' . $end_date->format('d M Y') . '.xlsx');
    }
}
