<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ToRateComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::where('status', 'Selesai')
        ->whereNull('rating')
        ->latest()
        ->get();

        $complaints_peruser = Complaint::where('status', 'Selesai')
        ->where('user_id', auth()->user()->id)
        ->whereNull('rating')
        ->latest()
        ->get();
        
        return view('to-rate-complaints.index', compact('complaints', 'complaints_peruser'));
    }

    public function updateRating(Request $request, Complaint $complaint){
        $complaint->rating = request('rating');
        $complaint->rating_remark = request('rating_remark');
        $complaint->status = 'Dinilai';
        $complaint->rated_at = now();
        $complaint->save();

        $message = 'Aduan ' . $complaint->report_no . ' BERJAYA dikemaskini.';

        return redirect()->route('to-rate-complaints.index')->with('success', $message);
    }
}
