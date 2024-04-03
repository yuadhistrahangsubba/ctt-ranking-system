<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\UserDetailsImport;
use Maatwebsite\Excel\Excel;


class UploadfileController extends Controller
{
    protected $excel;

    public function __construct(Excel $excel)
    {
        $this->excel = $excel;
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        $this->excel->import(new UserDetailsImport, $file);

        return redirect()->back()->with('success', 'Data imported successfully');
    }
}
