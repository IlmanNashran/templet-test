<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\User;

class NewComplaintController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $assigned = $request->input('assigned');

        $complaints = Complaint::where('status', 'Baharu');

        if ($search) {
            $complaints->where('report_no', 'LIKE', '%' . $search . '%');
        }

        if ($assigned == 1) {
            $complaints->whereNull('technician_id');
        }

        $complaints = $complaints->latest()->get();

        $technicians = User::where('role', 'technician')
            ->orWhere('role', 'supervisor')
            ->get();

        return view('new-complaints.index', compact('complaints', 'technicians'));
    }



    public function updateTechnician(Complaint $complaint){
        $complaint->technician_id = request('technician_id');
        $complaint->supervisor_id = auth()->user()->id;
        $complaint->supervisor_remark = request('supervisor_remark');
        $complaint->save();

        $message = 'Aduan ' . $complaint->report_no . ' BERJAYA dikemaskini.';

        return redirect()->route('new-complaints.index')->with('success', $message);
    }

    public function updateStatus(Request $request, Complaint $complaint){
        $complaint->status = request('status');
        $complaint->technician_remark = request('technician_remark');
        $complaint->responded_at = now();
        $complaint->save();

        $message = 'Aduan ' . $complaint->report_no . ' BERJAYA dikemaskini.';

        return redirect()->route('new-complaints.index')->with('success', $message);
    }


}
