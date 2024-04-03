<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Siddranking;
use App\Models\Socranking;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        // Fetch the total data from the Siddranking model
        $totalSiddrankingData = Siddranking::count();

        // Fetch the total data from the Socranking model
        $totalSocrankingData = Socranking::count();

        // Fetch the total data from the Socranking model
        $totalStudentData = Student::count();

        // Pass the data to the view
        return view('dashboards.index', compact('totalSiddrankingData', 'totalSocrankingData', 'totalStudentData'));
    }

}
