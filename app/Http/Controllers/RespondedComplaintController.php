<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class RespondedComplaintController extends Controller
{   
    public function index(Request $request)
    {

        $complaints = Complaint::where('status', 'Dijawab');
        $complaints = $complaints->latest()->get();
        $complaints_technician = Complaint::where('status', 'Dijawab')
            ->where('technician_id', auth()->user()->id)->get();

        return view('responded-complaints.index', compact('complaints', 'complaints_technician'));
    }

    public function updateStatus(Request $request, Complaint $complaint){
        $complaint->status = request('status');
        $complaint->technician_remark = request('technician_remark');
        if ($complaint->status === 'Selesai') {
            $complaint->completed_at = now();
        } else {
            $complaint->completed_at = null;
        }
        $complaint->save();

        $message = 'Aduan ' . $complaint->report_no . ' BERJAYA dikemaskini.';

        return redirect()->route('responded-complaints.index')->with('success', $message);
    }
}
