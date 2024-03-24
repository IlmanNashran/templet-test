<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today = date('d-m-Y');

        if (auth()->user()->role === 'staff') {
            $complaints_peruser = Complaint::where('user_id', auth()->user()->id)->get();
            $total_complaints = $complaints_peruser->count();
            $total_completed_complaints = $complaints_peruser->where('status', 'Selesai')->count();
            $total_new_complaints = $complaints_peruser->where('status', 'Baharu')->count();
            $total_responded_complaints = $complaints_peruser->where('status', 'Dijawab')->count();
            $total_to_rate_complaints = $complaints_peruser->where('status', 'Selesai')->whereNull('rating')->count();
            $total_to_rate_complaints_peruser = $complaints_peruser->where('status', 'Selesai')->whereNull('rating')->count();
            $total_kiv_complaints = $complaints_peruser->where('status', 'KIV')->count();
        } elseif (auth()->user()->role === 'technician') {
            $complaints_peruser = Complaint::where('technician_id', auth()->user()->id)->get();
            $total_complaints = $complaints_peruser->count();
            $total_completed_complaints = $complaints_peruser->where('status', 'Selesai')->count();
            $total_new_complaints = $complaints_peruser->where('status', 'Baharu')->count();
            $total_responded_complaints = $complaints_peruser->where('status', 'Dijawab')->count();
            $total_to_rate_complaints = $complaints_peruser->where('status', 'Selesai')->whereNull('rating')->count();
            $total_to_rate_complaints_peruser = $complaints_peruser->where('status', 'Selesai')->whereNull('rating')->count();
            $total_kiv_complaints = $complaints_peruser->where('status', 'KIV')->count();
        } else {
            $complaints_peruser = Complaint::where('user_id', auth()->user()->id)->get();
            $total_complaints = Complaint::all()->count();
            $total_completed_complaints = Complaint::where('status', 'Selesai')->count();
            $total_new_complaints = Complaint::where('status', 'Baharu')->count();
            $total_responded_complaints = Complaint::where('status', 'Dijawab')->count();
            $total_to_rate_complaints = Complaint::where('status', 'Selesai')->whereNull('rating')->count();
            $total_to_rate_complaints_peruser = $complaints_peruser->where('status', 'Selesai')->whereNull('rating')->count();
            $total_kiv_complaints = Complaint::where('status', 'KIV')->count();
        }
        return view('home', compact('today', 'total_complaints', 'total_completed_complaints',
        'total_new_complaints', 'total_responded_complaints', 'total_to_rate_complaints',
        'total_kiv_complaints', 'complaints_peruser', 'total_to_rate_complaints_peruser'));
    }
}
