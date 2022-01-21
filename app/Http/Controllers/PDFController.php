<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

use PDF;

class PDFController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        return view('applications.show', ['applications' => $applications]);
    }

    public function generatePDF(){
        $data =Application::all();

        view()->share('applications',$data);
        $pdf = PDF::loadView('applications.pdf');
        return $pdf->download('applications.pdf');
    }
}
