<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class KIVComplaintController extends Controller
{
    public function index(Request $request)
    {
        $complaints = Complaint::where('status', 'KIV');
        $complaints = $complaints->latest()->get();

        return view('kiv-complaints.index', compact('complaints'));
    }

    public function updateStatus(Request $request, Complaint $complaint){
        $complaint->status = request('status');
        $complaint->remark = request('remark');
        $complaint->save();

        $message = 'Aduan ' . $complaint->report_no . ' BERJAYA dikemaskini.';

        return redirect()->route('kiv-complaints.index')->with('success', $message);
    }
}
